<article class="pb40">

	@include('partials.votes')

	{{-- title --}}
	<h1 class="pb10">
			{{ $post->title }}
	</h1>

	{{-- url and tags --}}
	<div class="post-more pb5">
		@if ( $post->url )
			<h3 class="url pr10">
				<a href="{{ $post->url }}" target="_blank" rel="nofollow">
					<img src="http://www.google.com/s2/favicons?domain={{ $post->url }}">
					{{ $post->urldomain }}
				</a>
			</h3>
		@endif

		@if (!$post->tags->isEmpty())
			<h3 class="show-tags">
				<span class="normal-weight"> En: </span>
				@foreach($post->tags as $tag)
					<span class="tag">{{ $tag->name }}</span>
				@endforeach
			</h3>
		@endif
	</div>

	<div class="mini-sub-line"></div>

	{{-- content --}}
	<p class="pb10">{{ $post->content }}</p>

	{{-- meta --}}
	<h3 class="meta pb10">
		<i class="fa fa-calendar-blank"></i>
		<span class="pr10">
			@include('partials.dates')
		</span>
		<i class="fa fa-location-arrow-outline"></i>
		<span>
			{{ $post->location }}
		</span>
	</h3>

	<h3 class="grey pb10 block">
		Publicado
		<span class="post-time">{{ $post->created_at->diffForHumans() }}</span>
		por
		<a href="#" class="username">{{ $post->user->name }}</a>		
	</h3>

	<div class="sub-line"></div>







<h2> Comentarios <span>total: {{ count($post->comments) }} </h2>

Comentar


@if (Session::has('success'))

	<div>Mensaje de sesion: {{Session::get('success')}}</div>

@endif


@foreach($post->comments as $comment)
<div>
<p> {{ $comment->content }} </p>
<h3 class="grey">
	Escrito
	<span>{{ $comment->created_at->diffForHumans() }}</span>
	por
	<a href="#" class="username"> {{ $comment->user->name }} </a>
	<span class="vote-comment">
		<span class="vote-comment-up inline-block">
			0
			<i class="fa fa-triangle-up"></i>
		</span>
		<span class="vote-comment-down inline-block">
			0
			<i class="fa fa-triangle-down"></i>
		</span>
	</span>
</h3>

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


{{-- {!! Form::open(['route' => ['comment', $post->id]]) !!}

	{!! Form::label('comment', 'Comentario') !!}
	{!! Form::textarea('content', null, [
		'rows' => 2,
		'class' => 'prueba',
		'placeholder' => 'Escribe tu comentario'
	]) !!}

	<button type="submit" class="">Enviar</button>

{!! Form::close() !!} --}}

{{-- <h5>
	<strong>up:</strong>
	{{$post->up}}
	<strong>score:</strong>
	{{$post->score}}
</h5> --}}