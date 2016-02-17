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
}
