<div class="map-info">Nombre del local, bar, tienda, sala, calle, barrio, parque, casa de alguien,... Luego sitúalo arrastrando el marcador sobre el mapa</div>

<div class="form-group">
    <input type="text" name="location" id="location" value="{{ old('location', empty($post->location) ? '' : $post->location) }}" placeholder="Nombre del lugar" maxlength="120">
</div>

<div class="content-map-form">
	<div id="map"></div>

</div>
	<input type="hidden" class="add-field" name="lat" id="latitude" value=""/>
	<input type="hidden" class="add-field" name="lng" id="longitude" value=""/>