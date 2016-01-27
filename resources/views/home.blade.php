@extends('layouts.master')

@section('content')

@include('includes.header')

	<h1>You are logged in!</h1>
	<h2>{{ Auth::user()->name }}</h2>
	<h3>{{ Auth::user()->email }}</h3>



@endsection
