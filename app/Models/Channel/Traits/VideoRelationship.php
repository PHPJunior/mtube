<?php


namespace App\Models\Channel\Traits;


use App\Models\Channel\Channel;
use App\Models\Channel\Comment;

trait VideoRelationship
{
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
