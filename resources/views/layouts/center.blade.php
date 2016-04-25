@extends('layouts.master')

@section('content')

	<div class="content-small">

		<div class="limit-center">
			@yield('main')
		</div>

		@include('includes.footer')

	</div>

@endsection