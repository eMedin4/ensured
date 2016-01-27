
<h2><a href="{{ route('single', ['id' => $post, 'title' => $post->slug]) }}">{{ $post->title }}</a></h2>
<h3>{{ $post->location }}</h3>
<p>{{ $post->content }}</p>
<h5>
	<strong>up:</strong>
	{{$post->up}}
	<strong>score:</strong>
	{{$post->score}}
</h5>

<h5>

	{{ $post->created_at->format('d/m/y h:ia') }}

	{{ $post->user->name }}
</br>


<hr>
<h2> Votos: {{ count($post->postvotes) }}. Votantes: </h2>
	{{-- podria ser tambien {{ $post->postvotes()->count() }} --}}

{{--
@foreach($post->postvotes as $voters)

	<span>{{$voters->user->name}} </span>

@endforeach
--}}
@if ( true)
{!! Form::open(['route' => ['postvote', $post->id]]) !!}
	<button type="submit">Votar</button>
{!! Form::close() !!}
@else
Ya has votado
@endif

<hr>
<h2> Comentarios <span>total: {{ count($post->comments) }} </h2>

Comentar


@if (Session::has('success'))

	<div>Mensaje de sesion: {{Session::get('success')}}</div>

@endif


@foreach($post->comments as $comment)
<div>
<p> {{$comment->content}} </p>
<div> {{$comment->user->name}} </div>
{{-- Si tubiese un campo opcional, para mostrarlo: 
	@if ($comment->link) ...

	--}}
<h5>{{$comment->created_at->format('d/m/Y h:ia')}}</h5>

</div>
<br>
@endforeach



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


{!! Form::open(['route' => ['comment', $post->id]]) !!}

	{!! Form::label('comment', 'Comentario') !!}
	{!! Form::textarea('content', null, [
		'rows' => 2,
		'class' => 'prueba',
		'placeholder' => 'Escribe tu comentario'
	]) !!}

	<button type="submit" class="">Enviar</button>

{!! Form::close() !!}