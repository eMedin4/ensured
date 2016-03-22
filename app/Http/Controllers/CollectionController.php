<?php

namespace Ensured\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use Ensured\Http\Controllers\Controller;
use Ensured\Entities\Post;
use Ensured\Entities\User;
use Ensured\Entities\Collection;

class CollectionController extends Controller
{

    public function pagedetails($username)
    {

        $user = User::where('name', $username)->firstOrFail();
        $collections = $user->collections()->get();
        $title = "Listas";
        return view('pages.collectionsdetails', compact('collections', 'user', 'title'));        
    }

    public function show(Request $request)
    {

    	if( ! $request->ajax()) { 	    
	        return back(); 
	    }

	    $collections = Collection::where('user_id', '=', Auth::user()->id)->get();

   	    return response()->json(['collections' => $collections, 'count' => count($collections)]);

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

    public function add(Request $request)
    {

        if( ! $request->ajax()) {       
            return back(); 
        }


        $this->validate($request, [
            'title' => 'required|max:16',
            'permissions' => 'in:0,1'
            ]);

        $collection = new Collection();
        $collection->title = $request->input('title');
        $collection->permissions = $request->input('permissions');
        $collection->user_id = Auth::user()->id;
        $collection->save();
            
        return response()->json(['name' => $request->post_id, 'success' => true, 'message' => 'mensaje a enviar']);

    }

}
