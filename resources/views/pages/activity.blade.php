@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'userpage')

@section('content')

<div class="content content-limit">

    <div class="limit p30 overflow">

		<h1 class="h1-giant"> {{ $user->name }} </h1>
		<p class="for-icon pb20 soft-black bold-weight"><i class="fa fa-pencil-btb"></i> Añade una descripción sobre ti</p>


		<div class="grid-left inline-block">
		 	<div class="sidebar">
		 		<ul class="sidebar-menu">
		 			<li><a href="">Perfil</a></li>
		 			<li><a href="{{ route('activity', ['username' => Auth::user()->name ]) }}"><i class="fa fa-history"></i>Actividad</a></li>
		 			<li><a href=""><i class="fa fa-playlist-plus"></i>Colecciones</a></li>
		 			
		 		</ul>
		 		<ul class="sidebar-stats">
		 			<li>Miembro <span>{{ $user->created_at->diffForHumans() }}</span></li>
		 			<li>Articulos publicados: <span>{{ $activities->where('name', 'created_post')->count() }}</span></li>
		 			<li>Articulos votados: <span>{{ $activities->where('name', 'created_postvote')->count() }}</span></li>
		 			<li>Comentarios publicados: <span>{{ $activities->where('name', 'created_comment')->count() }}</span></li>
		 		</ul>
		 	</div>
		</div>
		<div class="grid-center inline-block right">
			<div class="main">
				<div class="pb20">
					<div class="nav-menu-head h1-mini inline-block"><i class="fa fa-history"></i>Actividad</div>
					<ul class="header-feed inline right">
						<li><span>Todo</span></li>
						<li class="relative"><span class="separator"></span></li>
						<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'articulos' ]) }}">Artículos</a></li>
						<li class="relative"><span class="separator"></span></li>
						<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'articulos' ]) }}">Artículos votados</a></li>
						<li class="relative"><span class="separator"></span></li>
						<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'comentarios' ]) }}">Comentarios</a></li>
						<li class="relative"><span class="separator"></span></li>
						<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'articulos' ]) }}">Coment. votados</a></li>
					</ul>
				</div>
				<section class="feed">
					@include('partials.activitylist')
				</section>
			</div>
		</div>			



	</div>

</div>


@endsection