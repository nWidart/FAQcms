@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Group Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<a href="{{ URL::to('admin/groups/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span2">{{ Lang::get('table.id') }}</th>
			<th class="span6">{{ Lang::get('admin/groups/table.name') }}</th>
			<th class="span2">{{ Lang::get('admin/groups/table.users') }}</th>
			<th class="span2">{{ Lang::get('admin/groups/table.created_at') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($groups as $group)
		<tr onclick="document.location='{{ URL::to('admin/groups/' . $group->id . '/edit') }}'" style="cursor: pointer">
			<td>
				{{ $group->id }}
			</td>
			<td>{{ $group->name }}</td>
			<td>{{ $group->users()->count() }}</td>
			<td>{{ $group->created_at() }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $groups->links() }}
@stop
