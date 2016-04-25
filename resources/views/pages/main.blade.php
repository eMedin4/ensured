@extends('layouts.split')

@section('title', 'Portada, todo lo que ocurre a tu alrededor')

@section('bodyclass', 'mainpage')

@section('main')

		<section class="main-header">
			<h1> {!! $title !!} </h1>
		</section>

		<section class="main-content">
			@foreach($posts as $post)
				@include('includes.articlelist')
			@endforeach
		</section>	

		<section class="main-footer">
			{!! $posts->links() !!}
		</section>

@endsection

@section('scripts')

	<script>var toJs = {!! $toJs !!};</script>

@endsection