
<article class="pb40 mainarticle">

	<header>
		@include('partials.votes')
		<h1 class="h1-mini toinline">
			<a href="{{ route('single', ['id' => $post, 'title' => $post->slug]) }}">
				{{ $post->title }}
			</a>
		</h1>
	</header>

	{{-- url and tags --}}
	<div class="post-more pb2">
		@if ( $post->url )
			<h3 class="url pr10 inline-block">
				<a href="{{ $post->url }}" target="_blank" rel="nofollow">
					<img src="http://www.google.com/s2/favicons?domain={{ $post->url }}">
					{{ $post->urldomain }}
				</a>
			</h3>
		@endif

 		@if (!$post->tags->isEmpty())
			<h3 class="show-tags inline-block">
				<span class="normal-weight"> En: </span>
				@foreach($post->tags as $tag)
					<span class="tag">{{ $tag->name }}</span>
				@endforeach
			</h3>
		@endif 
	</div>

	{{-- content --}}
	<p class="pb4">{{ $post->extract }}</p>

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

	<div class="meta-left h3">
		<span class="dates relative purple pr10">
			<i class="fa fa-calendar-text icon-calendar"></i>
			@include('partials.dates')
		</span>

		<span class="location relative purple">
			<i class="fa fa-location-arrow-outline"></i>
			{{ $post->location }}
		</span>
	</div>

</article>
