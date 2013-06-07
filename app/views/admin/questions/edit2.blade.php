@extends('admin/layouts.default')

@section('title')
@parent
:: Question Update
@stop

@section('content')

<div class="page-header">
    <h2>
        Question Update

        <div class="pull-right">
            <a href="{{ route('questions') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
        </div>
    </h2>
</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="row">
        <div class="span9">
            <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
                <input type="text" name="title" id="title" class="span9" value="{{ Input::old('title', $question->getTitleAttribute()) }}" />
                {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ title -->

            <!-- question -->
            <div class="control-group {{ $errors->has('question') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="question" id="question" placeholder="Question..." rows="10">{{ Input::old('question', $question->question) }}</textarea>
                {{ $errors->first('question', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ question -->

            <!-- response -->
            <div class="control-group {{ $errors->has('response') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="response" id="response" placeholder="Response..." rows="10">{{ Input::old('response', $question->getResponseAttribute()) }}</textarea>
                {{ $errors->first('response', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ response -->

            <!-- keywords -->
            <div class="control-group {{ $errors->has('keywords') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="keywords" id="keywords" placeholder="Keywords..." rows="5">{{ Input::old('keywords', $question->getKeywordsAttribute()) }}</textarea>
                {{ $errors->first('keywords', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ keywords -->
        </div>
        <div class="span3 well metaData">
            <!-- Form Actions -->
            <div class="btn-group">
                <!-- <a class="btn btn-link" href="{{ URL::to('admin/questions') }}">Cancel</a> -->
                <button type="reset" class="btn">{{ Lang::get('button.reset') }}</button>
                <button href="#modalDelete" role="button" data-toggle="modal" class="btn btn-danger">{{ Lang::get('button.delete') }}</button>
                <button type="submit" class="btn btn-success">{{ Lang::get('button.edit') }}</button>
            </div>
            <!-- ./ form actions -->
            <h4>Meta Data</h4>
            <!-- Question category -->
            <div class="control-group {{ $errors->has('category') ? 'error' : '' }}">
                <select name="category" id="category" class="selectJs">
                    <option value="0">Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" <?php echo ( Input::old('category') || ( $question->category_id == $category->id ) ) ? 'selected' : ''; ?>>{{ $category->name }}</option>
                    @endforeach
                </select>
                {{ $errors->first('category', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question category -->

            <!-- Question language -->
            <div class="control-group {{ $errors->has('lang') ? 'error' : '' }}">
                {{ Form::select('lang', array('0' => 'Choose Language', 'fr' => 'French', 'en' => 'English'), Input::old('lang', $question->lang ), array('class' => 'selectJs')); }}
                {{ $errors->first('lang', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question language -->

            <!-- Question priority -->
            <div class="control-group {{ $errors->has('priority') ? 'error' : '' }}">
                <label class="control-label" for="priority">Priority</label>
                <input type="text" name="priority" id="priority" value="{{ Input::old('priority', $question->priority) }}" />
                {{ $errors->first('priority', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question priority -->

            <!-- Question active -->
            <div class="control-group {{ $errors->has('active') ? 'error' : '' }}">
                <label class="control-label" for="active">Active</label>
                    <input type="checkbox" name="active" id="active" <?php echo (Input::old('active')  || ( $question->active) ) ? 'checked' : ''; ?> />
                    {{ $errors->first('active', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question active -->

            <!-- Question public -->
            <div class="control-group {{ $errors->has('public') ? 'error' : '' }}">
                <label class="control-label" for="public">Public</label>
                    <input type="checkbox" name="public" id="public" <?php echo (Input::old('public')  || ( $question->public) ) ? 'checked' : ''; ?> />
                    {{ $errors->first('public', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question public -->
        </div>
    </div>




{{ Form::close() }}

<div class="modal small hide fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmation de suppresion</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Etes vous sur de vouloir supprimer la question?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
        <a href="{{ URL::to('admin/questions/' . $question->id . '/delete') }}">
            <button class="btn btn-danger">Suprimmer</button>
        </a>
    </div>
</div>

@stop

@section('scripts')
<script>
$(document).ready(function()
{
    $('.wysihtml5-textarea').wysihtml5();
    $('select.selectJs').selectize({
        sortField: 'text'
    });
});
</script>
@stop
