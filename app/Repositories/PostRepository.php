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
            . 'CASE WHEN myvote.post_id IS NULL THEN 0 ELSE 1 END AS votestate'
            )->with(['user', 'tags', 'dates' => function ($query) {
                $query->orderBy('date', 'asc');
                }
            ])
            ->groupBy('posts.id');
    }

    public function myVotes($user, $ip)
    {
        $binip = inet_pton($ip);
        $hexip = bin2hex($binip);

        if ($user) {
            return 
                $this->selectPostsList()
                ->leftJoin('postvotes as myvote', function($query) use($user, $hexip) {
                    $query->on('myvote.post_id', '=', 'posts.id')
                          ->on(DB::raw("(myvote.user_id = '$user' Or HEX(myvote.ip_address) = '$hexip')"), DB::raw(''), DB::raw(''));
                });
        } else {
            return
                $this->selectPostsList()
                ->leftJoin('postvotes as myvote', function($query) use($hexip) {
                    $query->on('myvote.post_id', '=', 'posts.id')
                          ->on(DB::raw("HEX(myvote.ip_address) = '$hexip'"), DB::raw(''), DB::raw(''));
            });
        }
    }

    public function paginateMain($user, $ip)
    {
        return
            $this->myVotes($user, $ip)
            ->orderBy('score', 'DESC')
            ->paginate(40);
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
            ->paginate(40);
    }

    public function collection($id)
    {
        return $this->selectPostsList()
            ->whereHas('collections', function ($query) use($id) {
                $query->where('collection_id', $id);
            })
            ->paginate(40);
    }

    public function tag($tag)
    {
        return $this->selectPostsList()
            ->whereHas('tags', function ($query) {
                $query->whereIn('tag_id', [3,1]);
            })
            ->paginate(40);
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
            ->paginate(40);
    }

    public function paginateMaxScored()
    {
    	return $this->selectPostsList()
            ->where('score', '>', 200)
            ->orderBy('score', 'DESC')
            ->paginate(40);
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