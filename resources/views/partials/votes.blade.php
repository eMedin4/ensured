
<div class="btn-vote h1-mini" data-id="{{ $post->id }}" data-url="{{ route('postvote')}}">

	<span class="vote-count left">{{ count($post->postvotes) }}</span>
	<i class="fa fa-triangle-up"></i>

</div>