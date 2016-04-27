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
        $ip = $request->getClientIp();
        $binip = inet_pton($ip);
        $hexip = bin2hex($binip);
		/*$hexip = bin2hex(inet_pton('62.57.188.225'));*/

        if (Postvote::whereRaw("post_id = ? AND HEX(ip_address) = ?", array($request->post_id, $hexip))->count() > 0) {

            return response()->json(['state' => false, 'message' => 'Ya se ha votado desde esta ip']);

        }

    	$user_id = Auth::user() ? Auth::user()->id : null;
    	$postvote = new PostVote;
    	$postvote->post_id = $request->post_id;
    	$postvote->user_id = $user_id;
    	$postvote->ip_address = $binip;
    	$postvote->save();

        $post = Post::find($request->post_id);
        $count = count($post->postvotes);
        $post->up = $count;
        $post->save();

    	return response()->json(['state' => true, 'count' => $count]);

    }
}
