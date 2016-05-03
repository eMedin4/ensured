
<!-- -flex-row -->
<article class="post post-list post-single" data-id="{{ $post->id }}" data-link = {{ route('single', ['id' => $post, 'title' => $post->slug]) }}>

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

		<p class="post-extract">{{ nl2br(e($post->content)) }}</p>

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

	
	<div class="meta-single">
		Publicado por <a href="{{ route('filteractivity', ['username' => $post->user->name]) }}" class="username">{{ $post->user->name }}</a>
		<span class="post-time">{{ $post->created_at->diffForHumans() }}</span>
	</div>




	<div class="flex-between area-buttons">
		<div class="social-buttons">
	<!-- 	    <a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}" target="_blank"> -->
		    <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://blog.damirmiladinov.com/" target="_blank">
		       <i class="fa fa-facebook"></i>Compartir en facebook
		    </a>
		    <a class="share-twitter" href="https://twitter.com/intent/tweet?url=http://blog.damirmiladinov.com/" target="_blank">
		        <i class="fa fa-twitter"></i>Compartir en twitter
		    </a>
		</div>
		
		<div class="action-buttons">
			@if(Auth::check())
				<select name="report">
					<option value="opcion" selected>Voto negativo</option>
					<option value="irrelevante">por irrelevante</option>
					<option value="antigua">por antigua</option>
					<option value="spam">por spam</option>
					<option value="duplicada">por duplicada</option>
					<option value="errónea">por errónea</option>
				</select>
				@if(Auth::user()->id == $post->user->id)
					<a class="meta-link" href="#">borrar</a>
					<a class="meta-link" href="{{ route('edit', $post) }}">editar</a>
				@endif
			@endif
		</div>
	</div>





	<div class="comments-wrap">
		@include('partials.comments')
	</div>
