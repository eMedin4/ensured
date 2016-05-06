<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use DateTime;
use Gate;
use Carbon\Carbon;
use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Entities\Comment;
use Ensured\Entities\Tag;
use Ensured\Entities\Date;
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

    public function test()
    {
        /*PRUEBAS*/
    }

    public function main()
    {
        $ip = request()->ip();
/*        $binip = inet_pton($ip);
        $hexip = bin2hex($binip);

        $arr = [$ip, $binip, $hexip];
        dd($arr);*/

        $user = Auth::user() ? Auth::user()->id : null;
        $posts = $this->postRepository->paginateMain($user, $ip);
        $title = "Portada";
        $toJs = $posts->toJson();
        return view('pages.main', compact('posts', 'title', 'toJs'));
    }    


    public function single($id)
    {
    	$post = $this->postRepository->single($id);
        /*$comments = $this->postRepository->comments($id);*/
        $toJs = $post->toJson();

    	return view('pages.single', compact('post', 'toJs'));
    }


    public function create()
    {
        $tags = Tag::lists('name');
        $route = route('store');
        return view('pages.create', compact('tags', 'route'));
    }


    public function edit($id)
    {
        $tags = Tag::lists('name');
        $route = route('update', ['id' => $id]);
        $post = $this->postRepository->single($id);


        /*Llamamos a la habilidad (Authorization) declarada en AuthServiceProvider,
        si no es el autor del post lo deniega*/
        if (Gate::denies('update-post', $post)) {
            return back();
        }       

        return view('pages.create', compact('post', 'tags', 'route'));
    }



    public function store(Request $request)
    {

/*       dd($request->all());*/
        
        $rules = $this->rules($request->all());

        if($rules['input-multi-dates-format'] == 'error') {
            return Redirect::back()->withInput()->withErrors('hola');
        }


        if ($request->input('datestype') == 'single-date') {
            $datestype = 1;
        }
        elseif ($request->input('datestype') == 'interval-dates') {
            $datestype = 2;
        }
        elseif ($request->input('datestype') == 'multi-dates') {
            $datestype = 3;
        } else {
            return Redirect::back()->withInput()->withErrors('hola');
        }

        $this->validate($request,$rules);

        $post = new Post();
        $post->title = $request->input('title');
        $post->location = $request->input('location');
        $post->content = $request->input('content');
        $post->lat = $request->input('lat');
        $post->lng = $request->input('lng');
        $post->url = $request->input('url');
        $post->datestype = $datestype;
        $post->user_id = Auth::user()->id;
        $post->save();
        

        if ($datestype == 1) {

            $date = new Date();
            $date->post_id = $post->id;
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-single-date'));
            $date->date = $datetime->format('Y-m-d');
            $date->save();

        } elseif ($datestype == 2) {

            $date = new Date();
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-from-date'));
            $date->post_id = $post->id;
            $date->date = $datetime->format('Y-m-d');
            $date->save();

            $date = new Date();
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-to-date'));
            $date->post_id = $post->id;
            $date->date = $datetime->format('Y-m-d');
            $date->save();

        } elseif ($datestype == 3) {

            $dates = array_map('trim', explode(',', $request->input('input-multi-dates')));

            foreach($dates as $key => $val) {
                $date = new Date();
                $datetime = DateTime::createFromFormat('d/m/y', $val);
                $date->post_id = $post->id;
                $date->date = $datetime->format('Y-m-d');
                $date->save();
            }

        }

        if ($request->input('tags')) {
            foreach ($request->input('tags') as $tagname) {
                $tag = Tag::firstOrCreate(['name' => $tagname]);
                $post->tags()->attach($tag);
            }
        }

        return Redirect::route('single', [$post->id, $post->title]);

    }


    public function update($id, Request $request)
    {


        $rules = $this->rules($request->all());

        if($rules['input-multi-dates-format'] == 'error') {
            return Redirect::back()->withInput()->withErrors('hola');
        }


        if ($request->input('datestype') == 'single-date') {
            $datestype = 1;
        }
        elseif ($request->input('datestype') == 'interval-dates') {
            $datestype = 2;
        }
        elseif ($request->input('datestype') == 'multi-dates') {
            $datestype = 3;
        } else {
            return Redirect::back()->withInput()->withErrors('hola');
        }

        $this->validate($request,$rules);

        /*cambia con store*/
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->location = $request->input('location');
        $post->content = $request->input('content');
        $post->lat = $request->input('lat');
        $post->lng = $request->input('lng');
        $post->url = $request->input('url');
        $post->datestype = $datestype;
        $post->user_id = Auth::user()->id;
        $post->save();
        
        /*cambia con store*/
        Date::where('post_id', $post->id)->delete();

        if ($datestype == 1) {

            $date = new Date();
            $date->post_id = $post->id;
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-single-date'));
            $date->date = $datetime->format('Y-m-d');
            $date->save();

        } elseif ($datestype == 2) {

            $date = new Date();
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-from-date'));
            $date->post_id = $post->id;
            $date->date = $datetime->format('Y-m-d');
            $date->save();

            $date = new Date();
            $datetime = DateTime::createFromFormat('d/m/y', $request->input('input-to-date'));
            $date->post_id = $post->id;
            $date->date = $datetime->format('Y-m-d');
            $date->save();

        } elseif ($datestype == 3) {

            $dates = array_map('trim', explode(',', $request->input('input-multi-dates')));

            foreach($dates as $key => $val) {
                $date = new Date();
                $datetime = DateTime::createFromFormat('d/m/y', $val);
                $date->post_id = $post->id;
                $date->date = $datetime->format('Y-m-d');
                $date->save();
            }

        }

        if ($request->input('tags')) {
            foreach ($request->input('tags') as $tagname) {
                $tag = Tag::create(['name' => $tagname]);
                $post->tags()->attach($tag);
            }
        }

        return Redirect::route('single', [$post->id, $post->title]);

    }


    public function rules($data)
    {

        $rules = [
            'title' => 'required|max:120|min:3',
            'content' => 'required|max:20000|min:10',
            'location' => 'required|max:120|min:3',
            'input-single-date' => 'required_if:datestype,single-date|date_format:d/m/y',
            'input-from-date' => 'required_if:datestype,interval-dates|date_format:d/m/y',
            'input-to-date' => 'required_if:datestype,interval-dates|date_format:d/m/y',
            'input-multi-dates' => 'required_if:datestype,multi-dates',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'input-multi-dates-format' => 'array_date_format'
        ];

        if($data['datestype'] == 'multi-dates' && $data['input-multi-dates']) {

            $dates = array_map('trim', explode(',', $data['input-multi-dates']));
            foreach($dates as $key => $val) {

                $validateDate = \DateTime::createFromFormat('d/m/y',$val);

                if (!$validateDate) {
                    $rules['input-multi-dates-format'] = 'error';
                }

            }
        }   

        return $rules;     



    }

}
