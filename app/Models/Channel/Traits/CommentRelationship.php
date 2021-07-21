<?php


namespace App\Models\Channel\Traits;


use App\Models\Channel\Comment;

trait CommentRelationship
{
    public function commenter()
    {
        return $this->morphTo();
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function children()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }
}
