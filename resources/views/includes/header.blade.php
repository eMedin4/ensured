<header class="global-header">

	<div class="inner-global-header">

		<div class="logo left">
			<h1><a href="">LOCALSURE</a></h1>
		</div>

		<ul class="main-menu inline">
			<li @if(Route::is('main')) class="active" @endif><a href="{{ route('main') }}">Normal</a></li>
			<li @if(Route::is('score')) class="active" @endif><a href="{{ route('score') }}">Score > 200</a></li>
			<li><a href="">Mas comentarios</a></li>
			@if (Auth::guest()) 
			<!-- contrario sería Auth::check() -->
			    <li><a href="{{ url('/login') }}">Login</a></li>
			    <li><a href="{{ url('/register') }}">Register</a></li>
			@else
			    <li>{{ Auth::user()->name }}</li>
			    <li><a href="{{ route('create') }}">Nuevo</a></li>
			    <li><a href="{{ url('/logout') }}">Logout</a></li>
			@endif

		</ul>

	</div>

</header>