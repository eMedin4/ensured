<p class="text-info">Lugar</p>
<div class="form-group">
    <input type="text" name="location" id="location" value="{{ old('location', empty($post->location) ? '' : $post->location) }}" placeholder="Nombre del lugar" maxlength="120">
</div>
<div class="content-map-form">
	<div id="map"></div>

</div>
	<input type="hidden" class="add-field" name="lat" id="latitude" value=""/>
	<input type="hidden" class="add-field" name="lng" id="longitude" value=""/>