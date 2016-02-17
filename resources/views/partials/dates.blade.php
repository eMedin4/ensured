
<?php $setdata = 0; ?>
@foreach($post->dates as $date)

	@if ($date->date->isToday())

		<span class="special-date">hoy</span>
		<?php $setdata = 1; ?>

	@elseif ($date->date->isFuture())

		@if ($setdata == 1)
			<span class="extra-space"></span>
			<i class="fa fa-more-horiz icon-more"></i>
			<?php break; ?>

		@else

			{{ $date->date->formatLocalized('%a %d %b') }}
			<?php $setdata = 1; ?>

		@endif

	@endif

@endforeach

@if ($setdata == 0)

	<span class="special-date past-date">pasado</span>

@endif

