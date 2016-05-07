<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Repositories\PostRepository;

class RefinePostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function today() 
    {
    	$where = "dates.date = CURDATE()";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
    	$posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Hoy";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function tomorrow() 
    {
		$where = "dates.date = CURDATE() + INTERVAL 1 DAY";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Mañana";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function weekend() 
    {
		$start=date('Y-m-d', strtotime('next saturday'));
		$end=date('Y-m-d', strtotime('next sunday'));
		$where = "dates.date >= $start AND dates.date <= $end";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Este fin de semana";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function Week() 
    {
    	$where = "dates.date >= CURDATE() AND dates.date < CURDATE() + INTERVAL 7 DAY";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Esta semana <small>+7 días </small>";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function Month() 
    {
    	$where = "dates.date >= CURDATE() AND dates.date < CURDATE() + INTERVAL 30 DAY";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Este mes <small>+30 días </small>";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function Pasts() 
    {
    	$where = "dates.date > CURDATE()";
        $ip = request()->ip();
        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->time($where, $user, $ip)->paginate(40);
    	$title = "Ya iniciados o pasados";
    	$toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function byCollection($id, $collection)
    {
        $posts = $this->postRepository->collection($id);
        $title = $collection;
        $toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }

    public function search(Request $request)
    {
        $keywords = preg_split('/\s\s+/', $request->title);
        $posts = $this->postRepository->search($keywords);
        $title = 'búsqueda';
        $toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }
}
