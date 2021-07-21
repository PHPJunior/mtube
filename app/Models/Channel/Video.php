<?php

namespace App\Models\Channel;

use App\Models\Channel\Traits\VideoRelationship;
use Cklmercer\ModelSettings\HasSettings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\Traits\Votable;
use Overtrue\LaravelLike\Traits\Likeable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Video extends Model implements Viewable
{
    use HasFactory, Likeable, Votable, VideoRelationship, InteractsWithViews, HasSettings;

    protected $fillable = [
        'tus_id', 'media_id', 'name', 'description', 'disk', 'path',
        'thumbnail_url', 'file_size', 'file_type', 'duration', 'progress', 'status',
        'streaming_url'
    ];
}
