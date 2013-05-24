@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Question Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        Question Management

        <div class="pull-right">
            <input type="text" placeholder="Search..." class="jsSearchQuestions">
            <a href="{{ URL::to('admin/questions/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
        </div>
    </h3>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="span1 smallTr">Actions</th>
            <th class="span1">Priority</th>
            <th class="span1">Category</th>
            <th class="span1">Question fr</th>
            <th class="span1">Réponse fr</th>
            <th class="span1">Question en</th>
            <th class="span1">Réponse en</th>
            <th class="span1">Actif</th>
            <th class="span1">Public</th>
            <th class="span1">Title fr</th>
            <th class="span1">Title en</th>
            <th class="span1">Keywords fr</th>
            <th class="span1">Keywords en</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
        <tr>
            <td>
                <a href="{{ URL::to('admin/questions/' . $question->id . '/edit') }}" class="btn btn-mini">{{ Lang::get('button.edit') }}</a>
                <a href="{{ URL::to('admin/questions/' . $question->id . '/delete') }}" class="btn btn-mini btn-danger">{{ Lang::get('button.delete') }}</a>
            </td>
            <td>{{ $question->priority }}</td>
            <td>{{ $question->category->name }}</td>
            <td>{{ Str::limit( $question->question_fr, 50) }}</td>
            <td>{{ Str::limit( $question->reponse_fr, 50) }}</td>
            <td>{{ Str::limit( $question->question_en, 50) }}</td>
            <td>{{ Str::limit( $question->reponse_en, 50) }}</td>
            <td>{{ $question->actif }}</td>
            <td>{{ $question->public }}</td>
            <td>{{ Str::limit( $question->title_fr, 10) }}</td>
            <td>{{ Str::limit( $question->title_en, 10) }}</td>
            <td>{{ Str::limit( $question->keywords_fr, 10) }}</td>
            <td>{{ Str::limit( $question->keywords_en, 10) }}</td>
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
