<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;

class VoteController extends Controller
{
    public function postvote($id)
    {
    	$post = Post::findOrFail($id);

    	return redirect()->back();
    }
}
