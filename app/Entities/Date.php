<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    public $timestamps = false;

    protected $dates = [
    	'date'
    ];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }  

}
