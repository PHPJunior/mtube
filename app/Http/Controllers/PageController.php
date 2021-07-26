<?php

namespace App\Http\Controllers;

use App\Models\Channel\Channel;
use App\Models\Channel\Video;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        return view('site.page.home');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function watch(Request $request)
    {
        $video = Video::where('media_id', $request->get('v'))->first();
        if (auth()->check())
        {
            auth()->user()->hasSubscribed($video->channel);
            views($video)->collection(auth()->user()->hasSubscribed($video->channel) ? 'subscribed': 'unsubscribed')->record();
        }else{
            views($video)->collection('unsubscribed')->record();
        }
        return view('site.page.watch')->with([
            'video' => $video
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse|StreamedResponse
     */
    public function download(Request $request)
    {
        $video = Video::where('media_id', $request->get('v'))->first();
        if ($video->settings()->get('allow_download', false))
        {
            $headers = [
                'Content-Length: '. $video->file_size
            ];
            return Storage::disk($video->disk)->download($video->path, basename($video->path), $headers);
        }else{
            return response()->json(['message' => 'You dont have permission to download this video'], 403);
        }
    }

    /**
     * @param $slug
     * @param Request $request
     * @return Application|Factory|View
     */
    public function channel($slug, Request $request)
    {
        return view('site.page.channel')->with([
            'channel' => Channel::where('slug', $slug)->first()
        ]);
    }
}
