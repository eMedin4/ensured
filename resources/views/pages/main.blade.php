@extends('layouts.master')

@section('title', 'esto es el main')

@section('bodyclass', 'mainpage')

@section('content')

	<div class="content">

		<div class="left-50">
			<div id="map"></div>
		</div>
		<div class="right-50">
			<div class="inner-half">
				<div class="page-header sub-line">
					<h1> {!! $title !!} </h1>
				</div>
				<div class="page-index">
					@foreach($posts as $post)
						@include('includes.articlelist')
					@endforeach
				</div>
				{!! $posts->links() !!}
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
			</div>
		</div>

	</div>

	<script>
		var toJs = {!! $toJs !!};
	</script>

@endsection