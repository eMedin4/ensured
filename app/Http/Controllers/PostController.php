<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;

class PostController extends Controller
{
    public function main()
    {

    	$posts = Post::orderBy('score', 'DESC')->get();
    	return view('pages.main', compact('posts'));
    }
}
