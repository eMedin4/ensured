<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Commentvote extends Model
{
    public $timestamps = false;



    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }    
}
