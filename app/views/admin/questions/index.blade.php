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
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ URL::to('admin/questions/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i>  Create</a>
                </div>
                <div class="btn-group">
                    <a class="btn <?php echo (!$_GET) ? 'active' :''; ?>" href="{{ URL::to('admin/questions') }}">Show all</a>
                    <a class="btn <?php echo ( $_GET && $_GET['lang'] == 'fr') ? 'active' : ''; ?>" href="{{ URL::to('admin/questions?lang=fr') }}">{{ HTML::image('assets/img/lang/france.png') }}</a>
                    <a class="btn <?php echo ( $_GET && $_GET['lang'] == 'en') ? 'active' : ''; ?>" href="{{ URL::to('admin/questions?lang=en') }}">{{ HTML::image('assets/img/lang/United-Kingdom.png') }}</a>
                </div>
            </div>
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
            <th class="span1">Lang</th>
        </tr>
    </thead>
    <tbody>
        @if (!$_GET)
            @foreach ($questions as $question)
                @if ( $question->checkQuestion() )
                    @foreach ( $question->questionsLang->all() as $questionContent)
                        <tr onclick="document.location='{{ URL::to('admin/questions/' . $question->id . '/edit') }}'" style="cursor: pointer">
                            <td>{{ $question->priority }}</td>
                            <td>
                                <?php if (!empty( $question->category->name )) echo $question->category->name;  ?>
                            </td>
                            <td>{{ Str::limit( $questionContent->title, 50) }}</td>
                            <td>{{ Str::limit( $questionContent->question, 50) }}</td>
                            <td>{{ $question->active }}</td>
                            <td>{{ $question->public }}</td>
                            <td>{{ $question->created_at() }}</td>
                            <td>{{ $questionContent->lang }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        @else
        @foreach ($questions as $question)
            @if ( $question->checkQuestion() )
                <tr onclick="document.location='{{ URL::to('admin/questions/' . $question->id . '/edit') }}'" style="cursor: pointer">
                    <td>{{ $question->priority }}</td>
                    <td>
                        <?php if (!empty( $question->category->name )) echo $question->category->name;  ?>
                    </td>
                    <td>{{ Str::limit( $question->getTitleAttribute(), 50) }}</td>
                    <td>{{ Str::limit( $question->getQuestionAttribute(), 50) }}</td>
                    <td>{{ $question->active }}</td>
                    <td>{{ $question->public }}</td>
                    <td>{{ $question->created_at() }}</td>
                    <td>{{ $question->getLangAttribute() }}</td>
                </tr>
            @endif
        @endforeach
        @endif
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
