@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'createpage')

@section('content')

<div class="content content-limit">

	<div class="limit p30 white-background">

		<h1 class="big-title pb5 sub-line"> Añade tu contenido </h1>

		<p class="pb10 text-info">Por favor, antes de publicar lee estas indicaciones:</p>
		<ul class="instructions mb20">
			<li>Todas las publicaciones deben contener un qué, un cuándo y un dónde.</li>
			<li>Cuando envíes tu publicacion automáticamente estará disponible en la página, puedes editar todos los campos mas tarde si lo deseas.</li>
			<li><span>Título y contenido: </span>El título ha de ser lo mas específico posible, tienes 120 carácteres. En el contenido puedes desarrollarlo como desees</li>
			<li><span>Fechas: </span>Selecciona un único día, un intervalo entre un día de inicio y uno de fin, o múltiples días seleccionándolos uno a uno.</li>
			<li><span>Lugar: </span>Primero escribe el nombre del lugar, puede ser el nombre de un local, bar, tienda, teatro, sala, calle, barrio, plaza, parque, casa de
			alguien,... Luego sitúalo arrastrando el marcador sobre el mapa.</li>
			<li><span>Web y etiquetas: </span>Opcionalmente puedes añadir una direccion web a tu publicación. También puedes asignar un máximo de 2 etiquetas para ganar visibilidad.</li>
		</ul>



			<form method="POST" action="{{ route('create') }}">

			    {!! csrf_field() !!}


				@include('partials.formerrors')

				<div class="pb20">
					@include('partials.formcontent')
				</div>
				<div class="sub-line overflow">
					@include('partials.formcalendar')
				</div>
				<div class="pb20">
					@include('partials.formmap')
				</div>
				<div class="pb20">
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