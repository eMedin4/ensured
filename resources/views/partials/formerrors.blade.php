@if (count($errors) > 0)
    <div class="info info-error">
        <i class="fa fa-frown-o"></i>
        <h2>Uups...</h2>

		    <div>{{ $errors->first('title') }}</div>
		    <div>{{ $errors->first('content') }}</div>
		    <div>{{ $errors->first('location') }}</div>
		    @if ($errors->has('input-single-date') || $errors->has('input-from-date') || $errors->has('input-to-date') || $errors->has('input-multi-dates'))
		    	<div>Debes indicar una fecha válida</div>
		    @endif
		    @if ($errors->has('test'))
			    <div>yoooooooooooooooooooooooooooooooooooooooooo</div>
			@endif
		    @if ($errors->has('lat') || $errors->has('lng'))
			    <div>Debes arrastrar el marcador sobre el mapa. </div>
			@endif
			<div>{{ $errors->first('url') }}</div>
    </div>
@endif

