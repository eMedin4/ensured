<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'content'
    ];
    /*Solo se usará comment cuando usemos $request->all(), la otra opción es $request->only(['comment'])*/

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }    

    public function user()
    {
    	return $this->belongsTo(User::class);
    } 

    public function commentvote()
    {
    	return $this->hasMany(Commentvote::class);
    }       

}
