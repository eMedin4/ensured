@extends('layouts.small')
@section('title', 'actividad')
@section('main')

<div class="flex-row header-limit-page">
	<div>
		@if($user->avatar)
			<img class="avatar-me-extra" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="28" height="28" class="avatar-me-mini">
		@else
			<i class="fa fa-face avatar-me-extra"></i>
		@endif
		<h1 class="h1-extra">{{ $user->name }}</h1>
	</div>
	<div>
		@if (Auth::check())
			@if ($user->id == Auth::user()->id)
				<span>editar</span>
				<a href="{{ route('logout') }}">salir</a>
			@endif
		@endif
	</div>
</div>

<div class="limit-page">
	@if ($activities->isEmpty())

		<div>Sin actividad</div>
		
	@else

		@foreach ($activities as $event)





			@if ($event->name == 'created_post')
			<article class="post post-list flex-row"> 

				<div class="post-top"><i class="fa fa-create icon-activity icon-activity-create"></i></div>
				
				<div class="post-main">
					<h1 class="pb5">
						<a href="{{ route('single', ['id' => $event->subject->id, 'title' => $event->subject->slug]) }}">{{ $event->subject->title }}</a>
					</h1>
					<div class="text">
						<a href class="username">
							@if($user->avatar)
								<img class="avatar-me-mini" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="28" height="28" class="avatar-me-mini">
							@else
								<i class="fa fa-face avatar-me-mini"></i>
							@endif
							{{ $event->user->name }}
						</a> 
						publicó esto {{ $event->created_at->diffForHumans() }}
					</div>
				</div>
				
			</article>
			@endif





			@if ($event->name == 'created_comment')
			<article class="post post-list flex-row"> 

				<div class="post-top"><i class="fa fa-comment-text-outline icon-activity icon-activity-comment"></i></div>
				
				<div class="post-main">
					<h1 class="pb5">
						<a href="{{ route('single', ['id' => $event->subject->post->id, 'title' => $event->subject->post->slug]) }}">{{ $event->subject->post->title }}</a>
					</h1>
					<div class="text">
						<a href class="username">
							@if($user->avatar)
								<img class="avatar-me-mini" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="28" height="28" class="avatar-me-mini">
							@else
								<i class="fa fa-face avatar-me-mini"></i>
							@endif
							{{ $event->user->name }}
						</a> 
						escribió un comentario {{ $event->created_at->diffForHumans() }}
					</div>
					<p>{{ $event->subject->content }}</p>
				</div>

			</article>
			@endif





			@if ($event->name == 'created_postvote')
			<article class="post post-list flex-row"> 

				<div class="post-top"><i class="fa fa-triangle-up icon-activity icon-activity-vote"></i></div>

				<div class="post-main">
					<h1 class="pb5">
						<a href="{{ route('single', ['id' => $event->subject->id, 'title' => $event->subject->slug]) }}">{{ $event->subject->title }}</a>
					</h1>
					<div class="text">
						<a href class="username">
							@if($user->avatar)
								<img class="avatar-me-mini" src="{{ $user->avatar }}" alt="{{ $user->name }}" width="28" height="28" class="avatar-me-mini">
							@else
								<i class="fa fa-face avatar-me-mini"></i>
							@endif
							{{ $event->user->name }}
						</a> 
						votó esto {{ $event->created_at->diffForHumans() }}
					</div>
				</div>

			</article>	
			@endif

		@endforeach

	@endif
</div>
@endsection