@extends('layouts.small')
@section('title', 'Añade nuevo contenido')
@section('bodyclass', 'createpage')

@section('main')

{{--<!-- 	@if (old())
		{{dd(old())}}
	@endif  -->--}}

	<form method="POST" action="{{ route('store') }}">

	    {!! csrf_field() !!}
		@include('partials.formerrors')
		@include('partials.formcontent')
		@include('partials.formcalendar')
		@include('partials.formmap')
		@include('partials.formend', ['submitText' => 'Publicar'])
        
	</form>

@endsection

@section('scripts')
	<script>
		var tags = {!! $tags !!};
		var oldtags = new Array();
		@if (old('tags'))
			oldtags = <?php echo json_encode(old('tags')); ?>
		@endif
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="{{ asset('/assets/js/jquery-ui.multidatespicker.js') }}"></script>
	<script src="{{ asset('/assets/js/tag-it.js') }}"></script>

@endsection

