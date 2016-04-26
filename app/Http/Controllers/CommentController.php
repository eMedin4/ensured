<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use URL;
use Redirect;
use Ensured\Entities\Comment;
use Ensured\Entities\Commentvote;
use Ensured\Entities\Post;
use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            $url = URL::previous() . '#form-link';
            return Redirect::to($url)->withErrors($validator)->withInput();
        }


    	$comment = new Comment($request->all());
        $comment->user_id = Auth::user()->id;

    	$post = Post::findOrFail($id);
    	$post->comments()->save($comment);

 /*      otra opcion: 
        $comment->post_id = $id;
        $comment->save();*/

    	session()->flash('report', 'Tu comentario ha sido publicado');
    	return redirect()->back();

    }

    public function commentvote(Request $request)
    {

        if( ! $request->ajax()) {       
            return back(); 
        }

        if ($request->direction == 'comment-up') {
            $direction = 1;
            $dbdirection = 'up';
        } elseif ($request->direction == 'comment-down') {
            $direction = 0;
            $dbdirection = 'down';
        } else {
            return false;
        }

        $commentvote = new Commentvote;
        $commentvote->comment_id = $request->comment_id;
        $commentvote->user_id = Auth::user()->id;
        $commentvote->direction = $direction;
        $commentvote->save();

        $comment = Comment::where('id', $request->comment_id)->first();
        $comment->increment($dbdirection);

        $count = $comment->$dbdirection;

        return response()->json(['count' => $count, 'state' => 'CA']);

    }
}
