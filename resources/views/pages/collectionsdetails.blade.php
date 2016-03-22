@extends('layouts.page')

@section('main')

	<table class="menu-collection">
		<tbody>
			@foreach($user->collections as $collection)
				<tr>
					<td class="td-icon icon-collection relative">
						<i class="@if ($collection->title == 'favoritos') fa fa-favorite-border @else fa fa-folder-open @endif"></i>
					</td>
					<td>
						{{ $collection->title }}
					</td>
					<td class="td-icon permission-collection relative">
						<i class="@if ($collection->permissions == 0) fa fa-earth @else fa fa-lock @endif"></i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection