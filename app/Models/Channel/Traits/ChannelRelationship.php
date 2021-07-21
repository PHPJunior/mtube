<?php


namespace App\Models\Channel\Traits;


use App\Models\Auth\User;
use App\Models\Channel\Video;

trait ChannelRelationship
{
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'channel_id');
    }
}
