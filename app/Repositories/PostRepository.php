<?php

namespace Ensured\Repositories;

use DB;
use Ensured\Entities\Post;

class PostRepository {

    public function mainquery() 
    {
        return Post::selectRaw(
                    'posts.*, '
                    . '(SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) as num_comments, '
                    . 'CASE WHEN myvote.post_id IS NULL THEN 0 ELSE 1 END AS votestate'
                )->with(['user', 'tags', 'dates' => function ($query) {
                    $query->orderBy('date', 'asc');
                }])
                ->groupBy('posts.id')
                ->orderBy('score', 'DESC');
    }

    public function main($user, $ip) 
    {
        $binip = inet_pton($ip);
        $hexip = bin2hex($binip);

        if ($user) {
            return $this->mainquery()->leftJoin('postvotes as myvote', function($query) use($user, $hexip) {
                $query->on('myvote.post_id', '=', 'posts.id')
                    ->on(DB::raw("(myvote.user_id = '$user' Or HEX(myvote.ip_address) = '$hexip')"), DB::raw(''), DB::raw(''));
            });
        } else {
            return $this->mainquery()->leftJoin('postvotes as myvote', function($query) use($user, $hexip) {
                $query->on('myvote.post_id', '=', 'posts.id')
                    ->on(DB::raw("HEX(myvote.ip_address) = '$hexip'"), DB::raw(''), DB::raw(''));
            });
        }
    }


    public function time($where, $user, $ip)
    {
        return $this->main($user, $ip)
            ->whereExists(function($query) use ($where) {
                $query->select(DB::raw(1))
                    ->from('dates')
                    ->whereRaw("$where AND dates.post_id = posts.id");
            });
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