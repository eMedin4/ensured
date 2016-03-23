@extends('layouts.master')

@section('title', $post->title)

@section('bodyclass', 'singlepage')

@section('content')

	<div class="content">

		<div class="left-50 map-wrap">


			<div id="map"></div>
		</div>

		<div class="right-50">

			<div class="inner-half">

				@include('includes.articlesingle')

			</div>

		</div>

	</div>

	<script>
	var testObj = {!! $toJs !!};
	
	</script>


@endsection