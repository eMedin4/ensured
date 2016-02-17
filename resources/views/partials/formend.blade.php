<p class="info-note pb5">Opcionalmente, puedes añadir una dirección web a tu publicación. Tambien puedes asignar un máximo de 2 etiquetas para ganar visibilidad.</p>
<div class="form-group pb10">
    <input type="text" name="url" id="url" value="{{ old('url') }}" placeholder="web">
</div>
<div class="form-group pb20">
    <div class="add-tags modal-launcher"><i class="fa fa-add"></i>Click para añadir tags... </div>
</div>

{{-- MODAL BOX : TAGS --}}
	<div class="modal-background"></div>
	<div class="modal-content">
	    <div class="h2 sub-line"> Selecciona un máximo de 2 etiquetas </div>
	    <ul class="list-tags sub-line">
        	@foreach ($tags as $tag)
            	<li><span class="single-tag disable-tag" data-tagid="{{ $tag->id }}">{{ $tag->name }}</span></li>
        	@endforeach
    	</ul>
    	<div class="button mr20">Añadir</div>
    	<div class="button button-light modal-close">Cancelar</div>
	</div>​


<div class="form-group">
	<button type="submit" class="btn">Enviar</button>
</div>