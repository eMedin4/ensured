<header class="global-header">

	<div class="global-flex">

		<a class="nav-responsive" href="#"><span class="nav-icon"></span></a>

		<div class="logo">
			<a href="{{ route('main') }}">
				<h1>iFiTHAPPENS<span>#Barcelona</span> </h1>
			</a>
		</div>

		<nav class="nav-flex primary-menu">

			<a class="menu-home" href="{{ route('main') }}">Portada</a>

			<div class="relative menu-search">
				<span class="launch-dd-menu launch-sub-menu">Buscar</span>
				<div class="dd-menu sub-menu">
					<form method="GET" action="{{ route('search') }}">
						{!! csrf_field() !!}

						<div class="search-box flex-row">
							<input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Busca...">
							<div class="search-options relative">
								<span class="launch-selectable">Artículos<i class="fa fa-triangle-down"></i></span>
								<nav class="selectable">
									<span>Artículos</span>
									<span>Hashtags</span>
								</nav>
							</div>
							<button type="submit" class="btn-search"><i class="fa fa-search-btb"></i></button>
						</div>

					</form>
				</div>
			</div>

			<div class="relative menu-dates">
				<span class="launch-dd-menu launch-sub-menu">Fechas</span>
				<nav class="dd-menu sub-menu sub-nav-flex">
					<a href="{{ route('today') }}"><span>Hoy</span> <time>{{ $dateformat['today'] }}</time></a>
					<a href="{{ route('tomorrow') }}"><span>Mañana</span> <time>{{ $dateformat['tomorrow'] }}</time></a>
					<a href="{{ route('week') }}"><span>Esta semana</span> <time>{{ $dateformat['week'] }}</time></a>
					<a href="{{ route('weekend') }}"><span>Este fin de semana</span> <time>{{ $dateformat['weekend'] }}</time></a>
					<a href="{{ route('month') }}"><span>Este mes</span> <time>{{ $dateformat['month'] }}</time></a>				
					<span class="launch-menu-picker"><i class="fa fa-calendar-text icon-calendar"></i>Seleccionar un día</span>	
				</nav>
			</div>

<!-- 			<div class="relative menu-tags">
				<span class="launch-dd-menu launch-sub-menu">Tendencias</span>
				<nav class="dd-menu sub-menu sub-nav-flex">
					@foreach($tagTrends as $tag)
						<a href="{{ route('today') }}"><span>{{ $tag }}</span></a>
					@endforeach
				</nav>
			</div> -->


			@if (Auth::guest()) 
			    <a class="menu-register" href="{{ route('getregister') }}">Regístrate</a>
				<a class="menu-login" href="{{ route('getlogin') }}">Entra</a>
			@else
				<div class="relative menu-lists">
					<span class="launch-dd-menu launch-sub-menu launch-menu-collections" data-url="{{ route('menucollection')}}">Listas</span>
					<nav class="dd-menu sub-menu sub-nav-flex header-collections"></nav>
				</div>
			    <a class="menu-create" href="{{ route('create') }}">Publicar</a>
			    <a class="name-me menu-user" href={{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'todos' ]) }}>{{ Auth::user()->name }}</a>
			    @if(Auth::user()->avatar)
			    	<img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="28" height="28" class="avatar-me">
			    @else
			    	<i class="fa fa-face avatar-me"></i>
			    @endif
			@endif
		</nav>

		
		<a class="map-responsive" href="#">Mapa</a>

	</div><!-- global-flex -->

	@if (Session::has('report'))
		<div class="flash-message">{{Session::get('report')}}</div>
	@endif







</header>



{{--<!-- 				    	<span class="dropdown">{{ Auth::user()->name }}<i class="fa fa-chevron-down chevron"></i></span>
						<ul class="dropdown-menu user-dropdown-menu">
							<li><a href="{{ route('filteractivity', ['username' => Auth::user()->name, 'filter' => 'todos' ]) }}">Actividad</a></li>
							<li><a href="{{ route('logout') }}">Salir</a></li>				
						</ul> -->--}}