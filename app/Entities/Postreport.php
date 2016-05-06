<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Postreport extends Model
{
	protected static function boot()
	{
		parent::boot();

		static::created(function($postvote) {
			Activity::create([
				'subject_id' => $postvote->post->id,
	        	'subject_type' => Post::class,
	        	'name' => 'created_postreport',
	        	'user_id' => $postvote->user_id
	        ]);
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
