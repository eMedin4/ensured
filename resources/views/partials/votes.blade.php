@if(count($post->postvotes))
	<div class="btn-vote idle-votepost inline-block">
		<span class="vote-count relative">{{ Route::is('main') ? $post->num_votes : count($post->postvotes) }}<i class='fa fa-check'></i></span>
	</div>
@else
	<div class="btn-vote launch-votepost inline-block" data-id="{{ $post->id }}" data-url="{{ route('postvote')}}">
		<span class="vote-count relative">{{ Route::is('main') ? $post->num_votes : count($post->postvotes) }}<i class="fa fa-triangle-up"></i></span>
	</div>
@endif