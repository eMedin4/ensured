<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>I ♥ HTML - @yield('title')</title>
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>

<body class="@yield('bodyclass', '')">

@yield('content')

<script src="{{ asset('/assets/js/scripts.js') }}"></script>
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCod6UGQqYXibHSelQvfkQ5TN7K6k0xK0Q&libraries=places"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
 -->
<script src="{{ asset('/assets/js/map.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCod6UGQqYXibHSelQvfkQ5TN7K6k0xK0Q&callback=initMap">
</script>
</body>
</html>