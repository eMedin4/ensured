
<div class="relative right">

	<div class="dropdown launch-collections tooltip-launch" data-post-id="{{ $post->id }}" data-url="{{ route('collections')}}">
		<i class="fa fa-playlist-plus"></i>
		<div class="tooltip">Colecciones</div>
	</div>

	@if (Auth::check())
		<div class="dropdown-menu dropdown-collections pb10">
			<div class="header-collection h1-mini mini-sub-line">Guárdalo en una colección</div>
			<div class="content-collection tleft">
				<table class="table-collection" data-post-id="{{ $post->id }}" data-url="{{ route('savecollection')}}">
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="footer-collection">
				<span class="btn-add-collection" href="{{ route('getlogin') }}">Nueva colección</span>
				<div class="form-add-collection">
					<form method="POST" action="{{ route('create') }}">
						<input type="text" name="inputcollection" class="inputcollection" placeholder="Nueva colección" maxlength="20">
	    				{!! csrf_field() !!}
	    			</form>
	    		</div>
			</div>
		</div> 

	@else
		<div class="dropdown-menu dropdown-collections pb10">
			<div class="header-collection h1-mini mini-sub-line">Guárdalo en una colección</div>
			<div class="content-collection">Puedes marcar este artículo y guardarlo en tus favoritos o crear tus propias colecciones. Entra con tu usuario.</div>
			<div class="footer-collection">
				<a href="{{ route('getlogin') }}">Entra</a>
				o
			    <a href="{{ route('getregister') }}">Regístrate</a>
			</div>
		</div>
	@endif

</div>