@extends('layouts.master')

@section('content')

	<div class="content">

		<div class="left-50 map-wrap" data-marker="{{URL::asset('assets/images/def4.png')}}">
			<div id="map"></div>
		</div>

		<div class="right-50 main-flex">
			@yield('main')
			@include('includes.footer')
		</div>

	</div>
	
@endsection