@extends('layouts.master')

@section('title', 'esto es el create')

@section('bodyclass', 'createpage')

@section('content')



<div class="content content-limit">

	<div class="limit p30 white-background">

		<h1 class="big-title pb3"> Edita tu publicación </h1>

		@include('partials.instructions')

		<form method="POST" action="{{ route('update', $post->id) }}">

			{!! method_field('PATCH') !!}

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
				@include('partials.formend', ['submitText' => 'Actualizar'])
			</div>

		</form>

	</div>

</div>

@endsection

@section('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="{{ asset('/assets/js/jquery-ui.multidatespicker.js') }}"></script>

@endsection