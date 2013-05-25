@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Category Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <a href="{{ URL::to('admin/categories/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="span1">id</th>
            <th class="span1">Category Name</th>
            <th class="span1">Created At</th>
            <th class="span1">Questions Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr onclick="document.location='{{ URL::to('admin/categories/' . $category->id . '/edit') }}'" style="cursor: pointer">
            <td>
                {{ $category->id }}
            </td>
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
