<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Carbon\Carbon;
use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Entities\Comment;
use Ensured\Entities\Tag;
use Ensured\Repositories\PostRepository;

class PostController extends Controller
{

    private $postRepository;
    /*En el constructor pasamos la clas PostRepository por inyeccion
    de dependencias y le asignamos esa variable, entonces tenemos que
    declararla aqui y asignarla dentro del constructor*/

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function main()
    {
        $posts = $this->postRepository->paginateMain();
        $title = "Portada";
        $toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }    

    public function score()
    {

    	$posts = $this->postRepository->paginateMaxScored();

    	$title = "Esto es el score > 200";
        return view('pages.main', compact('posts', 'title'));
    }

    public function single($id)
    {
    	$post = $this->postRepository->single($id);
        $toJs = $post->toJson();

    	return view('pages.single', compact('post', 'toJs'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('pages.create', compact('tags'));
    }

    public function store(Request $request)
    {

        /*dd($request->all()); comprobar que envio*/
        $this->validate($request, [
            'title' => 'required|max:120'
        ]);

        $post = new Post($request->all());
        $post->location = "Parc del Guinardó";
        $post->content = "Quos quo magni voluptatem distinctio. Et suscipit voluptas laudantium corporis mollitia. Veniam nihil odit culpa ducimus officia est. Pariatur nulla fugiat aut enim repellendus. Eum sequi velit aut non earum placeat. Mollitia et quo autem quibusdam officia non. Quia error blanditiis distinctio non. Omnis in perferendis temporibus ut. Quas magni porro asperiores consectetur fuga ex. Et omnis voluptas voluptates doloremque provident. Quo aut fuga ut nostrum mollitia deserunt. Quis ipsum ea cumque necessitatibus. Aut fuga velit temporibus qui ducimus adipisci commodi. Suscipit velit quisquam sit officia quasi hic. ";
        $post->lat = 41.38247;
        $post->lng = 2.13534;
        $post->user_id = Auth::user()->id;
        $post->save();

        return Redirect::route('single', [$post->id, $post->title]);


    }

}
