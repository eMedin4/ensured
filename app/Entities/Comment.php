<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function Post()
    {
    	return $this->belongsTo('Post');
    }    

    public function user()
    {
    	return $this->belongsTo('User');
    } 

    public function commentvote()
    {
    	return $this->hasMany('Commentvote');
    }       

}
