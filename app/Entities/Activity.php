<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $fillable = ['subject_id', 'subject_type', 'name', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function subject()
    {
    	return $this->morphTo();
    }

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

}
