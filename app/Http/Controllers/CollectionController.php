<?php

namespace Ensured\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Entities\Collection;

class CollectionController extends Controller
{

    public function show(Request $request)
    {

    	if( ! $request->ajax()) { 	    
	        return back(); 
	    }

	    $collections = Collection::where('user_id', '=', Auth::user()->id)->get();
        if ( $collections->isEmpty() ) {
            $collections->push(['title' => 'favoritos']);
        }

   	    return $collections;

    }

    public function store(Request $request)
    {

    	if( ! $request->ajax()) { 	    
	        return back(); 
	    }

        $collection = new Collection();
        $collection->title = 'favoritos';
        $collection->user_id = Auth::user()->id;
        $collection->save();
        $collection->posts()->attach($request->post_id);  
            
    	return response()->json(['name' => $request->post_id, 'state' => '4']);

    }

}
