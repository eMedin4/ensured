
@if (count($post->comments) > 0)

	<div class="comments-head pb20">
		<div class="nav-menu-head relative inline-block">
			<i class="fa fa-comment-text-outline"></i>
			COMENTARIOS
		</div>
		<ul class="nav-menu inline right">
			<li><span>{{ count($post->comments) }} @if (count($post->comments) == 1) Comentario @else Comentarios @endif</span></li>
			<li class="relative"><span class="separator"></span></li>
			<li><a class="active" href="http://localhost/ensured/public/eMedin4/actividad/articulos">Importantes primero</a></li>
			<li class="relative"><span class="separator"></span></li>
			<li><a href="http://localhost/ensured/public/eMedin4/actividad/articulos">Cronológico</a></li>
			<li class="relative"><span class="separator"></span></li>
			<li><a href="http://localhost/ensured/public/eMedin4/actividad/comentarios">Últimos primero</a></li>
		</ul>
	</div>

	@foreach($post->comments as $comment)

		<article class="comment pb20">
			<p class="pb2"> {{ $comment->content }} </p>
			<h4 class="grey">
				Escrito
				<span>{{ $comment->created_at->diffForHumans() }}</span>
				por
				<a href="#" class="username"> {{ $comment->user->name }} </a>
				<span class="vote-comment" data-id="{{ $comment->id }}" data-url="{{ route('commentvote') }}">
					<span class="inline-block" data-direction="comment-up">
						{{ $comment->up }}
						<i class="fa fa-triangle-up"></i>
					</span>
					<span class="inline-block" data-direction="comment-down">
						{{ $comment->down }}
						<i class="fa fa-triangle-down"></i>
					</span>
				</span>
			</h4>
		</article>

	@endforeach

@else

	<div class="comments-head pb20">
		<div class="nav-menu-head relative inline-block">
			<i class="fa fa-comment-text-outline"></i>
			COMENTARIOS
		</div>
	</div>

	<div class="comments-empty mb20">
		Sin comentarios
	</div>



@endif

@if (Session::has('success'))
	<div>Mensaje de sesion: {{Session::get('success')}}</div>
@endif






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


@if (Auth::check()) 

	<h3 class="grey">Escribe tu comentario</h3>

	<form method="POST" action="{{ route('create') }}">

	    {!! csrf_field() !!}

	    <div class="form-group">
	    	<textarea name="content" id="content" class="input-comment" maxlength="20000">{{ old('content') }}</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn">Enviar</button>
		</div>

	</form>

@else

	<p class="info-note pb5">Debes <a href="{{ route('getregister') }}">registrárte</a> para escribir comentarios. Si ya tienes cuenta, <a href="{{ route('getlogin') }}">entra</a></p>

@endif