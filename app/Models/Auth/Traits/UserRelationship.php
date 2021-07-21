<?php


namespace App\Models\Auth\Traits;


use App\Models\Channel\Channel;

trait UserRelationship
{
    public function channels()
    {
        return $this->hasMany(Channel::class, 'owner_id');
    }
}
