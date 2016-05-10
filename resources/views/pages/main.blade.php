@extends('layouts.split')

@section('title', 'Barcelona, la nueva guia de actividades | ifithappens')
@section('meta', '<meta name="description" content="Guia social de actividades de Barcelona, participa o entérate de todo lo que ocurre cerca de ti">')

@section('bodyclass', 'mainpage')

@section('main')

		<div class="ad-main">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- postlist -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-6109753695990397"
			     data-ad-slot="2660684269"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>

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