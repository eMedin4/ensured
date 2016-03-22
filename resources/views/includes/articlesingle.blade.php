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
	<div class="meta-right h3">
	
		@include('partials.collections')

		@if ($post->num_comments)
			<div class="comments-count relative right">
				<i class="fa fa-comment-text-outline"></i> 
				{{ $post->num_comments }}
			</div>
		@endif
	</div>

	<div class="meta-left h3 pb10">
		<span class="dates relative purple pr10">
			<i class="fa fa-calendar-text icon-calendar"></i>
			@include('partials.dates')
		</span>

		<span class="location relative purple">
			<i class="fa fa-location-arrow-outline"></i>
			{{ $post->location }}
		</span>
	</div>

	<h3 class="grey pb10 block">
		Publicado
		<span class="post-time">{{ $post->created_at->diffForHumans() }}</span>
		por
		<a href="{{ route('filteractivity', ['username' => $post->user->name]) }}" class="username">
			{{ $post->user->name }}
		</a>
	
	</h3>

	<div class="sub-line"></div>




@include('partials.comments')