<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- {{-- verificación para google mail for work en este dominio --}} -->
	<meta name="google-site-verification" content="38qqobGsNWPGrtzhx6skRIbfkUY_xnv_jF9IlnTjWP8" />
	<title>I ♥ HTML - @yield('title')</title>
	<script src="https://use.typekit.net/ocy2tfu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" href="{{ asset('/assets/css/style2.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<script src="http://use.fonticons.com/73e4e1b7.js"></script>
</head>

<body class="@yield('bodyclass', '')">

	<!--Header of page-->
		@include('includes.header')

	<!--Content of page-->
		@yield('content')

	<!--Warnings popups-->
		<div class="popup"></div>
		<div class="popup-back"></div>

	<!--All site scripts-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCod6UGQqYXibHSelQvfkQ5TN7K6k0xK0Q&"></script>
		<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="{{ asset('/assets/js/scripts.js') }}"></script>
		<script src="{{ asset('/assets/js/scripts2.js') }}"></script>
		<script src="{{ asset('/assets/js/map.js') }}"></script>

	<!--Page scripts-->
		@yield('scripts')

</body>
</html>