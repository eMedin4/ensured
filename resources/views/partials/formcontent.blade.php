
<div class="form-main">
	<div class="form-group">

		<input type="text" name="title" id="post-title" value="{{ old('title', empty($post->title) ? '' : $post->title) }}" placeholder="Título" maxlength="50" data-url="{{ route('livesearch') }}">
		<div class="livesearch"></div>
	</div>


	<div class="form-group">

		<textarea rows="5" name="content" id="post-content" placeholder="Descripción" maxlength="20000">{{ old('content', empty($post->content) ? '' : $post->content) }}</textarea>
	</div>

	<div class="form-note">Opcional</div>
	<div class="form-group">

		<input type="text" name="url" id="post-url" value="{{ old('url', empty($post->url) ? '' : $post->url) }}" placeholder="Página web">	
	</div>


	<div class="form-group">
		<ul id="myTags" data-url="{{ route('tagsearch') }}"></ul>
		<div class="tag-info">
			<div class="tagsearch"></div>
		</div>
	</div>

	

</div>



