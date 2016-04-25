<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Entities\Post;

class SearchController extends Controller
{
    public function liveSearch(Request $request)
    {
		$posts = Post::whereRaw("MATCH(title,location,content) AGAINST(? IN BOOLEAN MODE)", 
				array($request->string))->take(5)->get();

		if ($posts->isEmpty()) {
			return response()->json(['count' => 0]);
		}
		return response()->json(['count' => 1, 'posts' => $posts]);
    }

    public function tagSearch(Request $request)
    {
		$posts = Post::with('tags')->whereRaw("MATCH(title,location,content) AGAINST(? IN BOOLEAN MODE)", 
				array($request->string))->take(20)->get();
		$tags = [];
		foreach($posts as $post) {
			foreach($post->tags as $tag) {
				$tags[] = $tag->name;
			}
		}
		$tags = array_unique($tags);
		return $tags;
    }
}
