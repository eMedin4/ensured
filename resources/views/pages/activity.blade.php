@extends('layouts.master')

@section('title', 'esto es el create')

@section('content')

<div class="content content-limit">

    <div class="limit p40">

		<h1 class="sub-line"> 
			{{ $user->name }} 
			<span class="breadcrumb"><i class="fa fa-chevron-right"></i> Actividad</span> 
		</h1>
			

		<ul class="feed">

			@include('partials.activitylist')
		</ul>

	</div>

</div>


@endsection