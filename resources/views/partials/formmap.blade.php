<p class="info-note">Escribe el nombre del lugar. Puede ser el nombre de un local, bar, tienda, teatro, sala, calle, barrio, plaza, parque, casa de alguien,... Luego sitúalo arrastrando el marcador sobre el mapa</p>
<div class="form-group">
    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="Nombre del lugar" maxlength="120">
</div>
<div class="content-map-form">
	<div id="map"></div>

</div>
	<input type="text" class="add-field" name="lat" id="latitude" value="{{ old('lat') }}"/>
	<input type="text" class="add-field" name="lng" id="longitude" value="{{ old('lng') }}"/>