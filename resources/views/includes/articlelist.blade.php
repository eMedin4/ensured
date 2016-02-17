
<article class="pb40">

	@include('partials.votes')

	{{-- title --}}
	<h1 class="pb4 h1-mini">
		<a href="{{ route('single', ['id' => $post, 'title' => $post->slug]) }}">
			{{ $post->title }}
		</a>
	</h1>

	{{-- url and tags --}}
	<div class="post-more pb2">
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

	{{-- content --}}
	<p class="pb4">{{ $post->extract }}</p>

	{{-- meta --}}


	<div class="meta-right">
	
		@include('partials.collections')

		@if ($post->num_comments)
			<div class="comments-count relative right">
				<i class="fa fa-comment-text-outline"></i> 
				{{ $post->num_comments }}
			</div>
		@endif
	</div>

	<div class="meta-left">
		<span class="dates relative purple pr10">
			<i class="fa fa-calendar-blank icon-calendar"></i>
			@include('partials.dates')
		</span>

		<span class="location relative purple">
			<i class="fa fa-location-arrow-outline"></i>
			{{ $post->location }}
		</span>
	</div>

</article>
