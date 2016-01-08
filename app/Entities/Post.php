<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user() //singular porque solo pertenece a un usuario
    {
    	return $this->belongsTo('User');
    	//Con esto podemos acceder al usuario de un post
    	//$post = Post::find(1);
    	//echo $post->user->name;
    }

    public function comments()
    {
    	return $this->hasMany('Comment');
    }    

    public function dates()
    {
    	return $this->hasMany('Date');
    }

    public function postvotes()
    {
    	return $this->hasMany('Postvote');
    }

    public function tags()
    {
    	return $this->belongsToMany('Ensured\Entities\Tag');
    	//Con esto podemos acceder a todos los tags de un post
    	//$post = Post::find(1)
    	//foreach ($post->tags as $tag)
    	//Tambien podemos acceder a todos los tags añadiendo condiciones
    	//$tags = Post::find(1)->tags()->orderBy()->get();
    }

}
