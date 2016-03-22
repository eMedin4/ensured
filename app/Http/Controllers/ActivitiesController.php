<?php

namespace Ensured\Http\Controllers;

use Illuminate\Http\Request;

use Ensured\Http\Requests;
use Ensured\Http\Controllers\Controller;

use Ensured\Entities\User;

class ActivitiesController extends Controller
{

    public function show($username, $filter = Null)
    {
    	
        $title = $this->getTitle($filter);

    	$user = User::where('name', $username)->firstOrFail();

        if(is_null($filter)) {
            $activities = $user->activities()->with('user', 'subject')->latest()->get();
        } else {
            $queryfilter = $this->getFilter($filter);
    	    $activities = $user->activities()->with('user', 'subject')->where('name', $queryfilter)->latest()->get();
        }

    	return view('pages.activity', compact('activities', 'user', 'title'));    	
    }

    public function getFilter($filter)
    {
        switch($filter) {
            case 'articulospublicados':
                return 'created_post';            
            case 'comentariospublicados':
                return 'created_comment';
            case 'articulosvotados':
                return 'created_postvote';
            default:
                return 'error';
        }
    }

    public function getTitle($filter)
    {
        switch($filter) {
            case Null:
                return "<span>Actividad</span> <i class='fa fa-chevron-right'></i> Todos";
            case 'articulospublicados':
                return "<span>Actividad</span> <i class='fa fa-chevron-right'></i> Artículos publicados";            
            case 'comentariospublicados':
                return "<span>Actividad</span> <i class='fa fa-chevron-right'></i> Comentarios publicados";
            case 'articulosvotados':
                return "<span>Actividad</span> <i class='fa fa-chevron-right'></i> Artículos votados";
            default:
                return 'error';
        }

    }
}
