@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'userpage')

@section('content')

	<div class="limit-wide">

		<div class="page-header">
			<h1 class="user-large"> {{ $user->name }} </h1>
		</div>

		<div class="page-flex">

			<div class="page-main">
				{!! $title !!}
				@yield('main')
			</div>

			<div class="page-sidebar">
				@include('partials.sidebar')
			</div>		

		</div>
	
	</div>

	@include('includes.footer')

@endsection