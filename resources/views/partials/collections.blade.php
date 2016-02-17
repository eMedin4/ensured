
<div class="relative right dropdown">

	<div class="launch-collections tooltip-launch">
		<i class="fa fa-playlist-plus"></i>
		<div class="tooltip">Guardar</div>
	</div>

	@if (Auth::check())
		<div class="dropdown-menu dropdown-collections">
			<div class="header-collection h1-alt mini-sub-line">Guárdalo en una colección</div>
			<div class="content-collection">Guárdalo</div>
			<div class="footer-collection">
				<a href="{{ route('getlogin') }}">Guardar</a>
			</div>
		</div> 

	@else
		<div class="dropdown-menu dropdown-collections">
			<div class="header-collection h1-alt mini-sub-line">Guárdalo en una colección</div>
			<div class="content-collection">Puedes marcar este artículo y guardarlo en tus favoritos o crear tus propias colecciones. Entra con tu usuario.</div>
			<div class="footer-collection">
				<a href="{{ route('getlogin') }}">Entra</a>
				o
			    <a href="{{ route('getregister') }}">Regístrate</a>
			</div>
		</div>
	@endif

</div>