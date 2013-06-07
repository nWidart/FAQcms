@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Create a New Question
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h2>
        Create a question

        <div class="pull-right">
            <a href="{{ route('questions') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
        </div>
    </h2>
</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="row-fluid">
        <div class="span9">
            <div class="control-group {{ $errors->has('title') ? 'error' : '' }}">
                <input type="text" name="title" id="title" class="span9" value="{{ Input::old('title') }}" placeholder="Title..."  />
                {{ $errors->first('title', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ title -->

            <!-- question -->
            <div class="control-group {{ $errors->has('question') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="question" id="question" placeholder="Question..." rows="10">{{ Input::old('question') }}</textarea>
                {{ $errors->first('question', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ question -->

            <!-- response -->
            <div class="control-group {{ $errors->has('response') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="response" id="response" placeholder="Response..." rows="10">{{ Input::old('response') }}</textarea>
                {{ $errors->first('response', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ response -->

            <!-- keywords -->
            <div class="control-group {{ $errors->has('keywords') ? 'error' : '' }}">
                <textarea class="span9 wysihtml5-textarea" name="keywords" id="keywords" placeholder="Keywords..." rows="5">{{ Input::old('keywords') }}</textarea>
                {{ $errors->first('keywords', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ keywords -->
        </div>
        <div class="span3 well metaData">

            <!-- Form Actions -->
            <div class="btn-group">
                <!-- <a class="btn btn-link" href="{{ URL::to('admin/questions') }}">Cancel</a> -->
                <button type="reset" class="btn btn-large">{{ Lang::get('button.reset') }}</button>
                <button type="submit" class="btn btn-success btn-large">{{ Lang::get('button.create') }}</button>
            </div>
            <!-- ./ form actions -->

            <h4>Meta Data</h4>
            <!-- Question category -->
            <div class="control-group {{ $errors->has('category') ? 'error' : '' }}">
                <select name="category" id="category" class="selectJs">
                    <option value="0">Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" <?php echo (Input::old('category')) ? 'selected' :''; ?>>{{ $category->name }}</option>
                    @endforeach
                </select>
                {{ $errors->first('category', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question category -->

            <!-- Question language -->
            <div class="control-group {{ $errors->has('lang') ? 'error' : '' }}">
                {{ Form::select('lang', array('0' => 'Choose Language', 'fr' => 'French', 'en' => 'English'), Input::old('lang'), array('class' => 'selectJs')); }}
                {{ $errors->first('lang', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question language -->

            <!-- Question priority -->
            <div class="control-group {{ $errors->has('priority') ? 'error' : '' }}">
                <label class="control-label" for="priority">Priority</label>
                <input type="text" name="priority" id="priority" value="{{ Input::old('priority') }}" />
                {{ $errors->first('priority', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question priority -->

            <!-- Question active -->
            <div class="control-group {{ $errors->has('active') ? 'error' : '' }}">
                <label class="control-label" for="active">Active</label>
                    <input type="checkbox" name="active" id="active" <?php echo ( Input::old('active') ) ? 'checked' : ''; ?> />
                    {{ $errors->first('active', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question active -->

            <!-- Question public -->
            <div class="control-group {{ $errors->has('public') ? 'error' : '' }}">
                <label class="control-label" for="public">Public</label>
                    <input type="checkbox" name="public" id="public" <?php echo ( Input::old('public') ) ? 'checked' : ''; ?> />
                    {{ $errors->first('public', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question public -->

            <h4>Translate a question</h4>
            <!-- Question linkTo -->
            <div class="control-group {{ $errors->has('linkTo') ? 'error' : '' }}">
                {{ Form::select('linkTo', array('0' => 'Link to ...', 'fr' => 'French', 'en' => 'English'), Input::old('linkTo'), array('class' => 'selectJs')); }}
                {{ $errors->first('linkTo', '<span class="help-inline">:message</span>') }}
            </div>
            <!-- ./ Question linkTo -->
        </div>
    </div>

{{ Form::close() }}

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
