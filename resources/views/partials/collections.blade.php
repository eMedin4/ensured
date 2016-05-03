

	<span class="tooltip-launch">
		<div class="tooltip">Listas</div>

		<i class="fa fa-playlist-plus icon-collections launch-dd-menu launch-collections" data-post-id="{{ $post->id }}" data-url="{{ route('collections')}}"></i>

		@if (Auth::check())
		<div class="dd-menu collections-menu">
			<div class="header-collection">Guárdalo en una lista</div>
			<div class="content-collection">
				<table class="table-collection" data-post-id="{{ $post->id }}" data-url="{{ route('savecollection')}}">
					<tbody>
					</tbody>
				</table>
			</div>

			<div class="footer-collection">
				<span class="btn-add-collection" href="{{ route('getlogin') }}">Nueva lista</span>
				<div class="form-add-collection">
					<form method="POST" action="{{ route('newcollection') }}" class="launch-new-collection">
						<div class="errors-collection"></div>
						{!! csrf_field() !!}
						<input type="text" name="inputcollection" class="inputcollection" placeholder="Nueva lista" maxlength="16">
	    				<div>
		    				<select class="inline-block permissions">
		    					<option value="0" selected>Pública</option>
		    					<option value="1">Privada</option>
		    				</select>
		    				<button type="submit" class="btn btn-mini right">Añadir</button>
	    				</div>
	    			</form>
	    		</div>
			</div>
		</div> 

		@else
		<div class="dd-menu collections-menu">
			<div class="header-collection">Guárdalo en una lista</div>
			<div class="content-collection content-collection-guest">Puedes marcar este artículo en tus favoritos o crear tus propias listas.</div>
			<div class="footer-collection footer-collection-guest">
				<a href="{{ route('getlogin') }}">Entra con tu usuario</a>
			</div>
		</div>
		@endif
		
	</span>



