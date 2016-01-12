@extends('layouts.master')

@section('title', 'esto es el main')

@section('content')

	<h1> Esto es el main </h1>

	@foreach($posts as $post)

		<h2>{{ $post->title }}</h2>
		<h3>{{ $post->location }}</h3>
		<p>{{ $post->content }}</p>
		<h5>
			<strong>up:</strong>
			{{$post->up}}
			<strong>score:</strong>
			{{$post->score}}
		</h5>
		</br>

	@endforeach

@endsection