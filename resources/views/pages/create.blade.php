@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'createpage')

@section('content')

<div class="content content-limit">

	<div class="limit p30">

		<h1 class="big-title pb5"> Añade tu contenido </h1>

		<p class="sub-line">Tu publicación debe contener un qué, un cuándo y un dónde. Para ello debes indicar un título y descripción, una fecha y un lugar. Una vez rellenado haz click en enviar para publicarlo, podrás editarlo mas tarde si lo deseas.</p>

			<form method="POST" action="{{ route('create') }}">

			    {!! csrf_field() !!}


				@include('partials.formerrors')

				<div class="pb40">
					@include('partials.formcontent')
				</div>
				<div class="pb40 overflow">
					@include('partials.formcalendar')
				</div>
				<div class="pb40">
					@include('partials.formmap')
				</div>
				<div class="pb40">
					@include('partials.formend')
				</div>


	            
			</form>

	</div>

</div>

@endsection

@section('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="{{ asset('/assets/js/jquery-ui.multidatespicker.js') }}"></script>

@endsection