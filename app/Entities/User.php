<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    protected $hidden = array('password', 'remember_token');

    public function posts()
    {
    	//User (opcionalmente) tiene muchos Post
    	return $this->hasMany('Post')
    	//Con esto podemos acceder a todos los posts de un usuario
    	//$posts = User::find(1)->comments()->where()->first()
    	//Para acceder al usuario de un post debemos definir la relacion inversa
    }

    public function comments()
    {
    	return $this->hasMany('Comment');
    }

}
