<header class="global-header">

	<div class="inner-global-header">

		<a class="nav-responsive" href="#">
            <span class="nav-icon"></span>
        </a>

		<div class="logo left">
			  <a href="{{ route('main') }}">
			    <h1 class="white-color">
			    	9topus
			    	<span>#Barcelona</span>
			    </h1>
			  </a>
		</div>

		<a class="map-responsive" href="#">Ver en mapa</a>

		<ul class="main-menu inline">
			
			@if (Auth::guest()) 
			<!-- contrario sería Auth::check() -->
			    <li class="menu-sign">
				    <a class="menu-sign-up" href="{{ route('getregister') }}">Regístrate</a> 
				    <span>/</span> 
				    <a class="menu-sign-in" href="{{ route('getlogin') }}">Entra</a>
			    </li>

			@else
			    <li class="relative">
			    	<span class="dropdown">{{ Auth::user()->name }}<i class="fa fa-chevron-down chevron"></i></span>
					<ul class="dropdown-menu user-dropdown-menu">
						<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'todos' ]) }}">Actividad</a></li>
						<li><a href="{{ route('logout') }}">Salir</a></li>				
					</ul>
			    </li>
			    <li><a href="{{ route('create') }}">Publicar</a></li>
			@endif

			<li class="relative">
				<span class="dropdown">Buscar<i class="fa fa-chevron-down chevron"></i>
				</span>
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

			<li class="relative">
				<span class="dropdown">Por fecha<i class="fa fa-chevron-down chevron"></i>
				</span>
				<ul class="dropdown-menu">
					<li><a href="{{ route('today') }}">Hoy</a></li>
					<li><a href="{{ route('tomorrow') }}">Mañana</a></li>
					<li><a href="{{ route('week') }}">Esta semana (+7d)</a></li>
					<li><a href="{{ route('weekend') }}">Fin de semana</a></li>
					<li><a href="{{ route('month') }}">Este mes (+30d)</a></li>					
					<li><a href="{{ route('pasts') }}">Ya iniciados y pasados</a></li>					
				</ul>
			</li>

			<li @if(Route::is('main')) class="active" @endif><a href="{{ route('main') }}">Portada</a></li>

		</ul>

	</div>

	@if (Session::has('message'))
		<div class="flash-message">{{Session::get('message')}}</div>
	@endif

</header>