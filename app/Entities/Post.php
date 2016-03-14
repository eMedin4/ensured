<?php

namespace Ensured\Entities;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Ensured\Traits\RecordsActivity;

class Post extends Model
{

    use RecordsActivity;

    protected $fillable = ['title'];

    /**
     * The attributes that should be visible in json
     */
    protected $visible = ['title', 'lat', 'lng', 'id'];

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
    	return $this->hasMany(Postvote::class)
            /*->where('user_id', 4)*/;
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

    public function getSlugAttribute() 
    {
        return str_slug($this->title);
    }

    public function getExtractAttribute()
    {   
        $more = " ...";
        $length = 300;
        $extract = $this->content;

        $extract = preg_replace("/<iframe[^>]*>.*?<\/iframe>/i", "(vídeo) ", $extract); 
        $extract = preg_replace("/<img.+?src=[\"'](.+?)[\"'].*?>/i", "(imagen) ", $extract); 

        if (strlen($extract) > $length) {
            $extract = wordwrap($extract, $length);
            $extract = explode("\n", $extract, 2);
            $extract = $extract[0] . $more;
        }
        return $extract;
    }

    public function getUrldomainAttribute()
    {
        return parse_url($this->url, PHP_URL_HOST);
    }





}
