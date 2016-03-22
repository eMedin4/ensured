
<article class="pb40 mainarticle" data-id="{{ $post->id }}" data-link = {{ route('single', ['id' => $post, 'title' => $post->slug]) }}>

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
			<p class="url pr10 inline-block">
				<a href="{{ $post->url }}" target="_blank" rel="nofollow">
					<img src="http://www.google.com/s2/favicons?domain={{ $post->url }}">
					{{ $post->urldomain }}
				</a>
			</p>
		@endif

 		@if (!$post->tags->isEmpty())
			<p class="show-tags inline-block relative">
				<i class="fa fa-tag-outline"></i>
				@foreach($post->tags as $i => $tag)
					<span class="tag">{{ $tag->name }}</span>
				@endforeach
			</p>
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

	<div class="meta-left dark-purple">
		<span class="dates relative pr10">
			<i class="fa fa-calendar-text icon-calendar"></i>
			@include('partials.dates')
		</span>

		<span class="location relative">
			<i class="fa fa-location-arrow-outline"></i>
			{{ $post->location }}
		</span>
	</div>

</article>
