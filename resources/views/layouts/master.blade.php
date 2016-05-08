<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	@yield('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- {{-- verificación para google mail for work en este dominio --}} -->
		<meta name="google-site-verification" content="38qqobGsNWPGrtzhx6skRIbfkUY_xnv_jF9IlnTjWP8" />
	<script src="https://use.typekit.net/ocy2tfu.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" href="{{ asset('/assets/css/style2.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<script src="http://use.fonticons.com/73e4e1b7.js"></script>
	<!-- favicon from  http://realfavicongenerator.net/-->
		<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="icons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="icons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="icons/manifest.json">
		<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="icons/favicon.ico">
		<meta name="apple-mobile-web-app-title" content="ifithappens">
		<meta name="application-name" content="ifithappens">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="icons/mstile-144x144.png">
		<meta name="msapplication-config" content="icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
	<!-- google analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-77288857-1', 'auto');
		  ga('send', 'pageview');
		</script>

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