@extends('layouts.master')

@section('title', 'esto es el main')

@section('bodyclass', 'singlepage')

@section('content')

	@include('includes.header')

	<div class="content">

		<div class="half-left">
			<div id="map"></div>
		</div>

		<div class="half-right">

			<h1> Esto es el single </h1>

			@include('includes.articlesingle')

		</div>

	</div>


@endsection