<article class="pb40 singlearticle">

	<header>
		@include('partials.votes')
		<h1 class="toinline">{{ $post->title }}</h1>	
	</header>



	{{-- url and tags --}}
	<div class="post-more">
		@if ( $post->url )
			<h3 class="url pr10 pb10 inline-block">
				<a href="{{ $post->url }}" target="_blank" rel="nofollow">
					<img src="http://www.google.com/s2/favicons?domain={{ $post->url }}">
					{{ $post->urldomain }}
				</a>
			</h3>
		@endif

		@if (!$post->tags->isEmpty())
			<h3 class="show-tags pb10 inline-block">
				<span class="normal-weight"> En: </span>
				@foreach($post->tags as $tag)
					<span class="tag">{{ $tag->name }}</span>
				@endforeach
			</h3>
		@endif
	</div>


	{{-- content --}}
	<p class="pb10">{{ $post->content }}</p>

	{{-- meta --}}
	<div class="meta-left dark-purple pb10">
		<span class="dates relative pr10">
			<i class="fa fa-calendar-text icon-calendar"></i>
			@include('partials.dates')
		</span>

		<span class="location relative">
			<i class="fa fa-location-arrow-outline"></i>
			{{ $post->location }}
		</span>
	</div>

	<div class="meta-right h3">

		@include('partials.collections')

	</div>
	
	<ul class="meta-single grey pb10 inline">
		<li>Publicado <span class="post-time">{{ $post->created_at->diffForHumans() }}</span> por</li>
		<li><a href="{{ route('filteractivity', ['username' => $post->user->name]) }}" class="username">{{ $post->user->name }}</a></li>
		<li class="right"><a class="meta-link" href="#">reportar</a></li>
		@if(Auth::check() && Auth::user()->id == $post->user->id)
			<li class="right"><a class="meta-link" href="#">borrar</a></li>
			<li class="right"><a class="meta-link" href="{{ route('edit', $post) }}">editar</a></li>
		@endif
	</ul>

	<div class="sub-line"></div>




@include('partials.comments')
