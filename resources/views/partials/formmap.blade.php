<p class="info-note">Escribe el nombre del lugar. Puede ser el nombre de un local, bar, tienda, teatro, sala, calle, barrio, plaza, parque, casa de alguien,... Luego sitúalo arrastrando el marcador sobre el mapa</p>
<div class="form-group">
    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="Nombre del lugar">
</div>
<div class="content-map-form">
	<div id="map"></div>
	<input type="hidden" class="add-field" name="lat" id="latitude"/>
	<input type="hidden" class="add-field" name="lng" id="longitude"/>
</div>