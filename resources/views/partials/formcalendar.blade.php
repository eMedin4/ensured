<p class="info-note pb5">Puedes seleccionar un único día, un intervalo con un día de inicio y uno de final, o múltiples días seleccionandolos uno a uno.</p>

<div class="datestype overflow pb10">

	<input type="radio" name="datestype" value="single-date" id="radio-single-date" checked>
	<label for="radio-single-date" class="label-radio">Una fecha</label>

	<input type="radio" name="datestype" value="interval-dates" id="radio-interval-dates">
	<label for="radio-interval-dates" class="label-radio">Un intervalo de fechas</label>

	<input type="radio" name="datestype" value="multi-dates" id="radio-multi-dates">
	<label for="radio-multi-dates" class="label-radio">Múltiples fechas</label>


</div>

<div class="content-box-date content-single-date">
    <input type="text" name="input-single-date" id="input-single-date" class="input-micro" value="{{ old('input-single-date') }}" placeholder="Día" readonly>
</div>

<div class="content-box-date content-interval-dates overflow">

	<div class="inline-form">
	    <input type="text" name="input-from-date" id="input-from-date" class="input-micro" value="{{ old('input-from-date') }}" placeholder="Desde" readonly>
	</div>

	<div class="inline-form">
	    <input type="text" name="input-to-date" id="input-to-date" class="input-micro" value="{{ old('input-to-date') }}" placeholder="Hasta" readonly>
	</div>

</div>

<div class="content-box-date content-multi-dates">
	<div id="pick-multi-dates"></div>
</div>
