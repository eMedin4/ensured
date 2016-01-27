<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title'
    ];

    public function user() //singular porque solo pertenece a un usuario
    {
    	return $this->belongsTo(User::class);
    	//Con esto podemos acceder al usuario de un post
    	//$post = Post::find(1);
    	//echo $post->user->name;
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
        /*Clase::class para imporatar la clase solo en >php5.5*/
    }    

    public function dates()
    {
    	return $this->hasMany(Date::class);
    }

    public function postvotes()
    {
    	return $this->hasMany(Postvote::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    	//Con esto podemos acceder a todos los tags de un post
    	//$post = Post::find(1)
    	//foreach ($post->tags as $tag)
    	//Tambien podemos acceder a todos los tags añadiendo condiciones
    	//$tags = Post::find(1)->tags()->orderBy()->get();
    }

    public function getSlugAttribute() {
        return str_slug($this->title);
    }

}
