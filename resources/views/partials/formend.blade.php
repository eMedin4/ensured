<p class="text-info">Opcional</p>
<div class="form-group pb10">
    <input type="text" name="url" id="url" value="{{ old('url', empty($post->url) ? '' : $post->url) }}" placeholder="web">
</div>
<!-- <div class="form-group pb20">
    <div class="add-tags modal-launcher"><i class="fa fa-add"></i>Click para añadir tags... </div>
</div> -->

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
</div>