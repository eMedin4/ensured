<header class="global-header">

	<div class="inner-global-header">

		<div class="logo left">
			  <a href="{{ route('main') }}">
			    <img src="{{ asset('/assets/images/logo.png') }}" alt="Octopusss" />
			  </a>
		</div>

		<ul class="main-menu inline">
			<li @if(Route::is('main')) class="active" @endif><a href="{{ route('main') }}">Portada</a></li>
			<li @if(Route::is('score')) class="dropdown active" @else class="dropdown" @endif>
				<span>Buscar<i class="fa fa-chevron-down"></i></span>
				<div class="dropdown-menu dropdown-search">
					<form method="POST" action="{{ route('create') }}">
			    		{!! csrf_field() !!}
			    		<div class="search-box relative">
	    					<input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Busca en los artículos">
	    					<i class="fa fa-search-btb"></i>
    					</div>
    				</form>
				</div>
			</li>
			<li @if(Route::is('score')) class="dropdown active" @else class="dropdown" @endif>
				<span>Por fecha<i class="fa fa-chevron-down"></i></span>
				<ul class="dropdown-menu">
					<li><a href="{{ route('today') }}">Hoy</a></li>
					<li><a href="{{ route('tomorrow') }}">Mañana</a></li>
					<li><a href="{{ route('week') }}">Esta semana (+7d)</a></li>
					<li><a href="{{ route('weekend') }}">Fin de semana</a></li>
					<li><a href="{{ route('month') }}">Este mes (+30d)</a></li>					
					<li><a href="{{ route('pasts') }}">Ya iniciados y pasados</a></li>					
				</ul>
			</li>
			<li><a href="">Mas comentarios</a></li>
			@if (Auth::guest()) 
			<!-- contrario sería Auth::check() -->
			    <li><a href="{{ route('getlogin') }}">Entra</a></li>
			    <li><a href="{{ route('getregister') }}">Regístrate</a></li>
			@else
			    <li class="dropdown">
			    	<span>{{ Auth::user()->name }}<i class="fa fa-chevron-down"></i></span>
					<ul class="dropdown-menu">
						<li><a href="{{ route('activity', ['username' => Auth::user()->name ]) }}">Actividad</a></li>
						<li><a href="#">Salir</a></li>				
					</ul>
			    </li>
			    <li><a href="{{ route('create') }}">Nuevo</a></li>
			    <li><a href="{{ route('logout') }}">Logout</a></li>
			@endif

		</ul>

	</div>

</header>