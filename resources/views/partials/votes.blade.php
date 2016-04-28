<!-- {{--

@if(count($post->postvotes))
	<div class="btn-vote idle-votepost inline-block">
		<span class="vote-count relative">{{ Route::is('main') ? $post->num_votes : count($post->postvotes) }}<i class='fa fa-check'></i></span>
	</div>
@else
	<div class="btn-vote launch-votepost inline-block" data-id="{{ $post->id }}" data-url="{{ route('postvote')}}">
		<span class="vote-count relative">{{ Route::is('main') ? $post->num_votes : count($post->postvotes) }}<i class="fa fa-triangle-up"></i></span>
	</div>
@endif

--}} -->


@if ($post->votestate == 0)
	<div class="launch-votepost" data-id="{{ $post->id }}" data-url="{{ route('postvote')}}">
		<i class="fa fa-triangle-up icon-activity icon-activity-vote"></i>
		<div class="count-votes">{{ $post->up }}</div>
	</div>
@else
	<div class="idle-votepost">
		<i class="fa icon-activity icon-activity-vote fa-check-bts"></i>
		<div class="count-votes">{{ $post->up }}</div>
	</div>
@endif




<!-- {{--<div class="post-votes" data-id="{{ $post->id }}" data-url="{{ route('postvote')}}">
	{{ Route::is('main') ? $post->num_votes : count($post->postvotes) }}
	<i class="fa fa-triangle-up"></i>
</div>--}} -->