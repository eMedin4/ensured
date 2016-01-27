@extends('layouts.master')

@section('title', 'esto es el main')

@section('bodyclass', 'mainpage')

@section('content')

	@include('includes.header')

	<div class="content">

		<div class="half-left">
			<div id="map"></div>
		</div>

		<div class="half-right">
			<h1> {{ $title }} </h1>

			<h2> Total de posts: {{ $posts->total() }} </h2>

			@foreach($posts as $post)
				@include('includes.articlelist')
			@endforeach

			{!! $posts->render() !!}
		</div>

	</div>

	

@endsection