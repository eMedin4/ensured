
<?php $setdata = 0; ?>
@foreach($post->dates as $date)

	@if ($date->date->isToday())

		<span class="special-date">hoy</span>
		<?php $setdata = 1; ?>

	@elseif ($date->date->isFuture())

		@if ($setdata == 1)
			<div class="icon-more">
				<i class="dropdown fa fa-more-horiz"></i>
				<div class="dropdown-menu dropdown-dates">
					@foreach($post->dates as $date)
						{{ rtrim($date->date->formatLocalized('%a'), '.') }}
						{{ $date->date->formatLocalized('%d') }}
						{{ rtrim($date->date->formatLocalized('%b'), '.') }}
					@endforeach
				</div>
			</div>
			<?php break; ?>

		@else

			{{ rtrim($date->date->formatLocalized('%a'), '.') }}
			{{ $date->date->formatLocalized('%d') }}
			{{ rtrim($date->date->formatLocalized('%b'), '.') }}
			<?php $setdata = 1; ?>

		@endif

	@endif

@endforeach

@if ($setdata == 0)

	<span class="special-date past-date">terminado</span>

@endif

