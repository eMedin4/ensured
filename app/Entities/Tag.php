<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public $timestamps = false;

    public $fillable = ['name'];

    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }

}
