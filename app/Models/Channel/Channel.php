<?php

namespace App\Models\Channel;

use App\Models\Channel\Traits\ChannelRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelSubscribe\Traits\Subscribable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class Channel extends Model implements BannableContract
{
    use HasFactory, ChannelRelationship, Subscribable, Bannable;

    protected $fillable = [
        'name', 'slug', 'active', 'disk', 'banner_image', 'profile_picture', 'video_watermark'
    ];
}
