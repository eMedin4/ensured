
<article class="post-list flex-row" data-id="{{ $post->id }}" data-link = {{ route('single', ['id' => $post, 'title' => $post->slug]) }}>

	<div class="post-top">
		@include('partials.votes')
	</div>

	<div class="post-main">

		<h1><a href="{{ route('single', ['id' => $post, 'title' => $post->slug]) }}">{{ $post->title }}</a></h1>

		@if ($post->url || !$post->tags->isEmpty())
			<div class="post-meta">

				@if ($post->url)
					<a class="post-link" href="{{ $post->url }}" target="_blank" rel="nofollow">
						<img src="http://www.google.com/s2/favicons?domain={{ $post->url }}">
						{{ $post->urldomain }}
					</a>
				@endif

		 		@if (!$post->tags->isEmpty())
					<p class="post-tags">
						<i class="fa fa-tag-outline"></i>
						<?php $prefix = ''; ?>
						@foreach($post->tags as $i => $tag)<?php echo $prefix; ?> <a href="#">{{ $tag->name }}</a><?php $prefix = ',' ?>@endforeach
					</p>
				@endif 
			</div>
		@endif

		<p class="post-extract">{{ $post->extract }}</p>

		<div class="post-info">

			<div class="post-info-left">
				<i class="fa fa-calendar-text icon-calendar"></i>
				@include('partials.dates')
				<i class="fa fa-location-arrow-outline icon-location"></i>
				{{ $post->location }}
			</div>

			<div class="post-info-right">
				@if ($post->num_comments)
					<i class="fa fa-comment-text-outline icon-comments"></i> 
					<span class="post-comments-count">{{ $post->num_comments }}</span>
				@endif	
				<span class="post-collections">@include('partials.collections')</span>
			</div>

		</div>

	</div><!-- post-main -->

</article>
