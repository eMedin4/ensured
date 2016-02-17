@foreach ($activities as $event)

	@if ($event->name == 'created_post')
	<li> 
		<a href class="username">{{ $event->user->name }}</a> publicó un artículo
		<a href="{{ route('single', ['id' => $event->subject_id, 'title' => $event->subject->slug]) }}" class="block">{{ $event->subject->title }}</a>
		<h3 class="grey block">{{ $event->created_at->diffForHumans() }}</h3> 
	</li>
	@endif

	@if ($event->name == 'created_comment')
	<li> 
		<a href class="username">{{ $event->user->name }}</a> publicó un comentario
		{{ $event->subject->content }} 
		en 
		<a href="{{ route('single', ['id' => $event->subject->post->id, 'title' => $event->subject->post->slug]) }}" class="block">{{ $event->subject->post->title }}</a>
		<h3 class="grey block">{{ $event->created_at->diffForHumans() }}</h3> 
	</li>
	@endif

	@if ($event->name == 'created_postvote')
	<li> 
		<a href class="username">{{ $event->user->name }}</a> votó un artículo 
		<a href="{{ route('single', ['id' => $event->subject->id, 'title' => $event->subject->slug]) }}" class="block">{{ $event->subject->title }}</a>
		<h3 class="grey block">{{ $event->created_at->diffForHumans() }}</h3> 
	</li>	
	@endif

@endforeach