<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
