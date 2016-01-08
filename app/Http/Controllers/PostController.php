<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;

class PostController extends Controller
{
    public function main()
    {
    	return view('pages.main');
    }
}
