@extends('layouts.page')

@section('main')

	<div class="bold-weight pb5"><i class="fa fa-face pr5"></i>{{$user->name}}</div>
	<div>Miembro desde {{ $user->created_at->diffForHumans() }}</div>

@endsection