

{{-- MODAL BOX : TAGS --}}
{{-- 	<div class="modal-background"></div>
	<div class="modal-content">
	    <div class="h1-mini header-modal"> Selecciona un máximo de 2 etiquetas </div>
	    <ul class="list-tags">
        	@foreach ($tags as $tag)
            	<li><span class="single-tag disable-tag" data-tagid="{{ $tag->id }}">{{ $tag->name }}</span></li>
        	@endforeach
    	</ul>
        <div class="footer-modal">
            <span class="btn-add-collection">Añadir</span>
            <span class="btn-add-collection modal-close">Cancelar</span>
        </div>

	</div>​ --}}


<div class="form-group">
	<button type="submit" class="btn">{{ $submitText }}</button>
    <button type="submit" class="btn btn-cancel">Cancelar</button>
</div>