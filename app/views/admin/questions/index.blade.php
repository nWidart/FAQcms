@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Question Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h2>
        Question Management

        <div class="pull-right">
            <a href="{{ URL::to('admin/questions/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
            <!-- <input type="text" placeholder="Search..." class="jsSearchQuestions"> -->
            <form class="form-search" method="POST" action="" style="display: inline;">
                <input type="text" class="input-medium search-query search" name="search" placeholder="Search...">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
    </h2>

</div>
{{ $questions->links() }}
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="span1">@lang('admin/questions/table.priority')</th>
            <th class="span1">@lang('admin/questions/table.category')</th>
            <th class="span1">@lang('admin/questions/table.title_fr')</th>
            <th class="span1">@lang('admin/questions/table.question_fr')</th>
            <th class="span1">@lang('admin/questions/table.active')</th>
            <th class="span1">@lang('admin/questions/table.public')</th>
            <th class="span1">@lang('admin/questions/table.created_at')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
        <tr onclick="document.location='{{ URL::to('admin/questions/' . $question->id . '/edit') }}'" style="cursor: pointer">
            <td>{{ $question->priority }}</td>
            <td>
                <?php if (!empty( $question->category->name )) echo $question->category->name;  ?>
            </td>
            <td>{{ Str::limit( $question->title_fr, 50) }}</td>
            <td>{{ Str::limit( $question->question_fr, 50) }}</td>
            <td>{{ $question->actif }}</td>
            <td>{{ $question->public }}</td>
            <td>{{ $question->created_at() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $questions->links() }}
@stop

@section('scripts')
<script>
$(document).ready(function() {
    $("input.jsSearchQuestions").on("change keyup paste", function()
    {
        var value = $(this).val(),
            data = {
                'search' : value
            };
        console.log(data);
        var posting = $.post( "/admin/questions", data );
        posting.done( function(data)
        {
            console.log(data);
            $.each(data, function(key, question) {
                console.log( question );
            });
        });
    });
});
</script>
@stop
