@extends('layouts.master')

@section('content')

	<div class="content-small">

		<div class="limit-small">
			@yield('main')
		</div>

		@include('includes.footer')

	</div>

@endsection