<p class="pb7 text-info">Fechas</p>
<div class="datestype overflow pb10">

	<input type="radio" name="datestype" value="single-date" id="radio-single-date" @if(!old('datestype') || old('datestype') == 'single-date') checked @endif>
	<label for="radio-single-date" class="label-radio">Una fecha</label>

	<input type="radio" name="datestype" value="interval-dates" id="radio-interval-dates" @if(old('datestype') == 'interval-dates') checked @endif>
	<label for="radio-interval-dates" class="label-radio">Un intervalo de fechas</label>

	<input type="radio" name="datestype" value="multi-dates" id="radio-multi-dates" @if(old('datestype') == 'multi-dates') checked @endif>
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
	<div class="pick-multi-dates"></div>
	<span><textarea rows="1" id="input-multi-dates" class="input-multi-dates" name="input-multi-dates" value="{{ old('input-multi-dates') }}" placeholder="fechas seleccionadas"></textarea></span>
</div>
