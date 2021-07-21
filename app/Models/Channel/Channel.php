<?php

namespace App\Models\Channel;

use App\Models\Channel\Traits\ChannelRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelSubscribe\Traits\Subscribable;

class Channel extends Model
{
    use HasFactory, ChannelRelationship, Subscribable;

    protected $fillable = [
        'name', 'slug', 'active', 'disk', 'banner_image', 'profile_picture', 'video_watermark'
    ];
}
