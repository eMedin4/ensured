
@foreach ($activities as $event)

	@if ($event->name == 'created_post')
	<article class="pb30"> 
		<div class="h4 pb3 grey"><a href class="username">{{ $event->user->name }}</a> publicó un artículo {{ $event->created_at->diffForHumans() }}</div>
		<h1 class="h1-mini"><a href="{{ route('single', ['id' => $event->subject_id, 'title' => $event->subject->slug]) }}" class="block">{{ $event->subject->title }}</a></h1>

	</article>
	@endif

	@if ($event->name == 'created_comment')
	<article class="pb30"> 
		<div class="h4 pb3 grey"><a href class="username">{{ $event->user->name }}</a> publicó un comentario {{ $event->created_at->diffForHumans() }}</div>
		<p>{{ $event->subject->content }}</p>
		<span class="h4 grey">en</span> 
		<h1 class="h1-mini inline-block"><a href="{{ route('single', ['id' => $event->subject->post->id, 'title' => $event->subject->post->slug]) }}" class="block">{{ $event->subject->post->title }}</a><h1 class="h1-mini pl10"></h1>

	</article>
	@endif

	@if ($event->name == 'created_postvote')
	<article class="pb30"> 
		<div class="h4 pb3 grey"><a href class="username">{{ $event->user->name }}</a> votó un artículo {{ $event->created_at->diffForHumans() }}</div>
		<h1 class="h1-mini"><a href="{{ route('single', ['id' => $event->subject->id, 'title' => $event->subject->slug]) }}" class="block">{{ $event->subject->title }}</a></h1>
	</article>	
	@endif

@endforeach