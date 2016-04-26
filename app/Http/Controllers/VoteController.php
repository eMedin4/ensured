<?php

namespace Ensured\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Entities\PostVote;

class VoteController extends Controller
{
    public function postvote(Request $request)
    {

    	if( ! $request->ajax()) { 	    
	        return back(); 
	    }

		$hexip = bin2hex(inet_pton($request->getClientIp()));
    	$user_id = Auth::user() ? Auth::user()->id : null;
    	$postvote = new PostVote;
    	$postvote->post_id = $request->post_id;
    	$postvote->user_id = $user_id;
    	$postvote->ip_address = $hexip;
    	$postvote->save();

        $post = Post::find($request->post_id);
        $count = count($post->postvotes);
        $post->up = $count;
        $post->save();

    	return response()->json(['count' => $count, 'state' => 'ok']);

    }
}
