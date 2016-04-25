<?php

namespace Ensured\Repositories;

use DB;
use Ensured\Entities\Post;

class PostRepository {
	
	protected function selectPostsList()
    {
        return Post::selectRaw(
            'posts.*, '
            . '(SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as num_comments, '
            . '(SELECT COUNT(*) FROM postvotes WHERE postvotes.post_id = posts.id) as num_votes'
            )->with(['user', 'tags', 'postvotes', 'dates' => function ($query) {
                $query->orderBy('date', 'asc');
            }]);
    }

    public function paginateMain()
    {

    	return $this->selectPostsList()
        ->orderBy('score', 'DESC')
        ->paginate(10);
    }


    public function time($where)
    {
        return $this->selectPostsList()
            ->whereExists(function($query) use ($where) {
                $query->select(DB::raw(1))
                    ->from('dates')
                    ->whereRaw("$where AND dates.post_id = posts.id");
            })
            ->orderBy('score', 'DESC')
            ->paginate(10);
    }

    public function collection($id)
    {
        return $this->selectPostsList()
            ->whereHas('collections', function ($query) use($id) {
                $query->where('collection_id', $id);
            })
            ->paginate(10);
    }

    public function tag($tag)
    {
        return $this->selectPostsList()
            ->whereHas('tags', function ($query) {
                $query->whereIn('tag_id', [3,1]);
            })
            ->paginate(10);
    }

    public function search($keywords)
    {
        return $this->selectPostsList()
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhere('title', 'like', "%{$word}%");
                    $query->orWhere('content', 'like', "%{$word}%");
                }
            })
            ->paginate(10);
    }

    public function paginateMaxScored()
    {
    	return $this->selectPostsList()
            ->where('score', '>', 200)
            ->orderBy('score', 'DESC')
            ->paginate(10);
    }

    public function single($id)
    {
    	return Post::findOrFail($id);
/*    	$comments = Comment::select('comments.*', 'users.name')
    		->join('users', 'comments.user_id', '=', 'users.id')
    		->where('post_id', $id)
    		->get();*/
    }

/*    public function comments($id)
    {
        return Comment::selectRaw()
            ->where('post_id', $id)
    }*/

}