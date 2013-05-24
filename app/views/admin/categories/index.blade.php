@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Category Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        Category Management

        <div class="pull-right">
            <a href="{{ URL::to('admin/categories/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
        </div>
    </h3>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="span1 smallTr">Actions</th>
            <th class="span1">ID</th>
            <th class="span1">Category Name</th>
            <th class="span1">Created At</th>
            <td class="span1">Questions Count</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>
                <a href="{{ URL::to('admin/categories/' . $category->id . '/edit') }}" class="btn btn-mini">{{ Lang::get('button.edit') }}</a>
                <a href="{{ URL::to('admin/categories/' . $category->id . '/delete') }}" class="btn btn-mini btn-danger">{{ Lang::get('button.delete') }}</a>
            </td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at() }}</td>
            <td>{{ $category->questions()->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}
@stop
@scripts
<script>

</script>
@stop
