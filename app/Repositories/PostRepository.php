<?php

namespace Ensured\Repositories;

use Ensured\Entities\Post;

class PostRepository {
	
	protected function selectPostsList()
    {
        return Post::selectRaw(
            'posts.*, '
            . '(SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as num_comments, '
            . '(SELECT COUNT(*) FROM postvotes WHERE postvotes.post_id = posts.id) as num_votes'
            )->with('user');
            //eager loading: with user: user es el metodo de relacion del modelo post
    }

    public function paginateScored()
    {

    	return $this->selectPostsList()
        ->orderBy('score', 'DESC')
        ->paginate(3);

    }

    public function paginateMaxScored()
    {
    	return $this->selectPostsList()
            ->where('score', '>', 200)
            ->orderBy('score', 'DESC')
            ->paginate(3);
    }

    public function single($id)
    {
    	return Post::findOrFail($id);
/*    	$comments = Comment::select('comments.*', 'users.name')
    		->join('users', 'comments.user_id', '=', 'users.id')
    		->where('post_id', $id)
    		->get();*/
    }

}