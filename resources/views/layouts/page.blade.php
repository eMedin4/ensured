@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'userpage')

@section('content')

<div class="content content-limit">

<h1 class="header-page h1-giant"> {{ $user->name }} </h1>

    <div class="limit white-background p30 overflow page-height">

		<div class="grid-center inline-block left">
			<div class="main">
				<div class="pb20">
					<h1 class="h1-ext sub-line-alt page-header">{!! $title !!}</h1>
				</div>
				<section class="feed">
					@yield('main')
				</section>
			</div>
		</div>	

		<div class="grid-sidebar inline-block">
			@include('partials.sidebar')
		</div>		
	</div>
</div>

@include('includes.footer')