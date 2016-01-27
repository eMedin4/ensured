@extends('layouts.master')

@section('title', 'esto es el create')

@section('content')

	@include('includes.header')

	<h1> Formulario de creación </h1>

	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oops!</strong> Por favor corrige los errores debajo:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

	{!! Form::open(['route' => 'create']) !!}

		{!! Form::label('title', 'Titulo') !!}
		{!! Form::textarea('title', null, [
			'rows' => 2,
			'class' => 'prueba',
			'placeholder' => 'prueba placeholder'
			]) !!}

		<button type="submit" class="">Enviar</button>

	{!! Form::close() !!}



@endsection