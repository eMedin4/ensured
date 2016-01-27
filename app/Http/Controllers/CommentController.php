<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Ensured\Entities\Comment;
use Ensured\Entities\Post;
use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {

    	$this->validate($request, [
    		'content' => 'required|min:4'
    	]);

    	$comment = new Comment($request->all());
        $comment->user_id = Auth::user()->id;

    	$post = Post::findOrFail($id);
    	$post->comments()->save($comment);

 /*      otra opcion: 
        $comment->post_id = $id;
        $comment->save();*/

    	session()->flash('success', 'Tu comentario se ha guardado');
    	return redirect()->back();

    }
}
