
<div class="sidebar">
	<ul class="sidebar-menu">
		<li><span class="bold-weight"><i class="fa fa-face"></i>Perfil</span></li>
		<li><a href="{{ route('profile', ['username' => $user->name]) }}">Perfil</a></li>
		<li><span class="bold-weight"><i class="fa fa-history"></i>Actividad</span></li>
		<li><a href="{{ route('filteractivity', ['username' => $user->name]) }}">Todo</a></li>
		<li><a href="{{ route('filteractivity', ['username' => $user->name, 'filter' => 'articulospublicados' ]) }}">Artículos publicados</a></li>
		<li><a href="{{ route('filteractivity', ['username' => $user->name, 'filter' => 'articulosvotados' ]) }}">Artículos votados</a></li>
		<li><a href="{{ route('filteractivity', ['username' => $user->name, 'filter' => 'comentariospublicados' ]) }}">Comentarios publicados</a></li>
		<li><a href="{{ route('filteractivity', ['username' => $user->name, 'filter' => 'articulospublicados' ]) }}">Comentarios votados</a></li>
		<li><span class="bold-weight"><i class="fa fa-playlist-plus"></i>Listas</span></li>
		<li><a href="{{ route('pagecollections', ['username' => Auth::user()->name ]) }}">Ver listas</a></li>
	</ul>

	<ul class="sidebar-stats">
		<li>Miembro <span>{{ $user->created_at->diffForHumans() }}</span></li>
	</ul>
</div>