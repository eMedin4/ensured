
@if (count($post->comments) > 0)

	<div class="comments-head pb20 bold-weight">

		<div class="comment-title relative inline-block">
			<i class="fa fa-comment-text-outline"></i>Comentarios
		</div>

		<ul class="nav-menu inline right">
			<li><span>Total: {{ count($post->comments) }}</span></li>
			<li class="relative">
		    	<span class="dropdown">Importantes primero<i class="fa fa-chevron-down chevron"></i></span>
				<ul class="dropdown-menu user-dropdown-menu">
					<li><a href="#">Importantes primero</a></li>
					<li><a href="#">Últimos primero</a></li>				
				</ul>
			</li>
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

@if (count($errors) > 0)
    <div class="info info-error mb20">
        <i class="fa fa-frown"></i>
        <h2>Uups...</h2>
		<div>{{ $errors->first('content') }}</div>
    </div>
@endif




@if (Auth::check()) 

	<h3 class="grey">Escribe tu comentario</h3>

	<form method="POST" id="form-link" action="{{ route('comment.create', ['id' => $post->id]) }}">

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