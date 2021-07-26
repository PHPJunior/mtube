<?php

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

if (!function_exists('get_current_route_name')) {
    /**
     * @param $route_name
     * @param string $class
     * @return mixed|string
     */
    function get_current_route_name($route_name, string $class = 'active') {
        return request()->route()->getName() == $route_name ? $class : '';
    }
}

if (! function_exists('includeFilesInFolder')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeFilesInFolder($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        includeFilesInFolder($folder);
    }
}

if (! function_exists('getVideoDurationInSeconds')) {

    /**
     * @param $path
     * @param string $disk
     * @return int
     */
    function getVideoDurationInSeconds($path, string $disk = 'public'): int
    {
        return FFMpeg::fromDisk($disk)->open($path)->getDurationInSeconds();
    }
}

if (! function_exists('percentageCalculate')) {
    /**
     * @param $value
     * @param $total
     * @return float|int
     */
    function percentageCalculate($value, $total) {
        return $value > 0 ? ($value/$total)*100 : 0;
    }
}

if (! function_exists('getFrameFromSeconds')) {

    /**
     * @param $path
     * @param int $seconds
     * @param string $disk
     * @return string
     */
    function getFrameFromSeconds($path, int $seconds = 2 , string $disk = 'public'): string
    {
        return FFMpeg::fromDisk($disk)->open($path)->getFrameFromSeconds($seconds)->export()->getFrameContents();
    }
}


if (! function_exists('humanFileSize')) {

    function humanFileSize($bytes, $decimals = 2): string
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }
}

if (! function_exists('gravatar')) {

    /**
     * @param $value
     * @param int $size
     * @return string
     */
    function gravatar($value, int $size = 80): string
    {
        $hash =  md5(strtolower(trim( $value)));
        return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=monsterid";
    }
}

if (! function_exists('paginate')) {
    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
