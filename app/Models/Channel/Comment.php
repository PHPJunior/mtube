<?php

namespace App\Models\Channel;

use App\Models\Channel\Traits\CommentRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, CommentRelationship;

    protected $fillable = [
        'comment', 'pinned', 'heart'
    ];

    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }
}
