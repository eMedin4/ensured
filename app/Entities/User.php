<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
    	//User (opcionalmente) tiene muchos Post
    	return $this->hasMany(Post::class);
    	//Con esto podemos acceder a todos los posts de un usuario
    	//$posts = User::find(1)->comments()->where()->first()
    	//Para acceder al usuario de un post debemos definir la relacion inversa
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function postvotes()
    {
        return $this->hasMany(Postvote::class);
    }

    public function hasVoted(Post $post)
    {
        return Postvote::where(['user_id' => $this->id, 'post_id' => $post->id])->count();
    }

    public function vote(Post $post)
    {
        if ($this->hasVoted($post)) return false;

        $this->postvotes()->attach($post->id);

        return true;
    }


}
