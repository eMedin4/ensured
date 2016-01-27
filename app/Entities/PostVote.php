<?php

namespace Ensured\Entities;

use Illuminate\Database\Eloquent\Model;

class Postvote extends Model
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
