
<div class="form-main">
	<div class="datestype">
		<input type="radio" name="datestype" value="single-date" id="radio-single-date" @if(!old('datestype') || old('datestype') == 'single-date') checked @endif>
		<label for="radio-single-date" class="label-radio">Un único día</label>
		<input type="radio" name="datestype" value="interval-dates" id="radio-interval-dates" @if(old('datestype') == 'interval-dates') checked @endif>
		<label for="radio-interval-dates" class="label-radio">Intervalo de días</label>
		<input type="radio" name="datestype" value="multi-dates" id="radio-multi-dates" @if(old('datestype') == 'multi-dates') checked @endif>
		<label for="radio-multi-dates" class="label-radio">Múltiples días</label>
	</div>

	<div class="js-datestype content-single-date">
	    <input type="text" name="input-single-date" id="input-single-date" class="input-micro" value="{{ old('input-single-date') }}" placeholder="Día" readonly>
	</div>

	<div class="js-datestype content-interval-dates">
		<input type="text" name="input-from-date" id="input-from-date" class="input-micro" value="{{ old('input-from-date') }}" placeholder="Desde" readonly>
		<input type="text" name="input-to-date" id="input-to-date" class="input-micro" value="{{ old('input-to-date') }}" placeholder="Hasta" readonly>
	</div>

	<div class="js-datestype content-box-date content-multi-dates">
		<div class="flex-dates">
			<div class="pick-multi-dates"></div>
			<textarea rows="1" id="input-multi-dates" class="input-multi-dates" name="input-multi-dates" value="{{ old('input-multi-dates') }}" placeholder="Fechas seleccionadas"></textarea>
		</div>
	</div>

</div>


