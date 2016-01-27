
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


<h2> Votos: {{ $post->num_votes }}. </h2>
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


<h2> Comentarios <span>total: {{ $post->num_comments }}</h2>
<hr>
<br>
<br>