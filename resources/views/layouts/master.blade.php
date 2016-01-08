<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>I ♥ HTML - @yield('title')</title>
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>

<body>

@yield('content')

<script src="{{ asset('/assets/js/scripts.js') }}"></script>
</body>
</html>