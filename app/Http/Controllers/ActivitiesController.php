<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;

use Ensured\Entities\User;

class ActivitiesController extends Controller
{
    public function show($username)
    {
    	$user = User::where('name', $username)->firstOrFail();
    	$activities = $user->activities()->with('user', 'subject')->latest()->get();
    	return view('pages.activity', compact('activities', 'user'));
    }

    public function filter($username, $filter)
    {
    	$filter = $this->getFilter($filter);
    	$user = User::where('name', $username)->firstOrFail();
    	$activities = $user->activities()->with('user', 'subject')->where('name', $filter)->latest()->get();
    	return view('pages.activity', compact('activities', 'user'));    	
    }

    public function getFilter($filter)
    {
    	if ($filter == 'articulos') {
    		return 'created_post';
    	} elseif ($filter == 'comentarios') {
    		return 'created_comment';
    	} else {
    		return 'error';
    	}
    }
}
