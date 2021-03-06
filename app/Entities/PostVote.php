<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;


class Postvote extends Model
{

	protected static function boot()
	{
		parent::boot();

		static::created(function($postvote) {
			if ($postvote->user_id) { //si es usuario invitado no guardar
				Activity::create([
					'subject_id' => $postvote->post->id,
		        	'subject_type' => Post::class,
		        	'name' => 'created_postvote',
		        	'user_id' => $postvote->user_id
		        ]);
		     }
		});
	}

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
