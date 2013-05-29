@extends('admin/layouts.default')

@section('title')
@parent
:: Question Update
@stop

@section('content')

<div class="row">a</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    <li><a href="#tab-french" data-toggle="tab">French</a></li>
    <li><a href="#tab-english" data-toggle="tab">English</a></li>
    <li><a href="#tab-remarques" data-toggle="tab">Remarques</a></li>
</ul>
<!-- ./ tabs -->

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- Tab General -->
        <div class="tab-pane active" id="tab-general">
            <!-- Question priority -->
            <div class="control-group {{ $errors->has('priority') ? 'error' : '' }}">
                <label class="control-label" for="priority">Priority</label>
                <div class="controls">
                    <input type="text" name="priority" id="priority" value="{{ Input::old('priority', $question->priority) }}" />
                    {{ $errors->first('priority', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Question priority -->

            <!-- Question category -->
            <div class="control-group {{ $errors->has('category') ? 'error' : '' }}">
                <label class="control-label" for="category">Category</label>
                <div class="controls">
                    <select name="category" id="category">
                        <option value="0">Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" <?php echo ( Input::old('category') || ( $question->category_id == $category->id ) ) ? 'selected' : ''; ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('category', '<span class="help-inline">:message</span>') }}
                    <!-- end category1 -->
                </div>
            </div>
            <!-- ./ Question category -->

            <!-- Question actif -->
            <div class="control-group {{ $errors->has('actif') ? 'error' : '' }}">
                <label class="control-label" for="actif">Actif</label>
                <div class="controls">
                    <input type="checkbox" name="actif" id="actif" <?php echo (Input::old('actif')  || ( $question->actif) ) ? 'checked' : ''; ?> />
                    {{ $errors->first('actif', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Question actif -->

            <!-- Question public -->
            <div class="control-group {{ $errors->has('public') ? 'error' : '' }}">
                <label class="control-label" for="public">public</label>
                <div class="controls">
                    <input type="checkbox" name="public" id="public" <?php echo ( Input::old('public')  || ( $question->public) ) ? 'checked' : ''; ?> />
                    {{ $errors->first('public', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Question public -->

            <!-- Question checked -->
            <div class="control-group {{ $errors->has('checked') ? 'error' : '' }}">
                <label class="control-label" for="checked">checked</label>
                <div class="controls">
                    <input type="checkbox" name="checked" id="checked" <?php echo (Input::old('checked')) ? 'checked' : ''; ?> />
                    {{ $errors->first('checked', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Question checked -->

        </div>
        <!-- ./ tab general -->

        <!-- Meta French -->
        <div class="tab-pane" id="tab-french">
            <!-- question_fr -->
            <div class="control-group {{ $errors->has('question_fr') ? 'error' : '' }}">
                <label class="control-label" for="question_fr">Question</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="question_fr" id="question_fr" value="question_fr" rows="10">{{ Input::old('question_fr', $question->question_fr) }}</textarea>
                    {{ $errors->first('question_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ question_fr -->

            <!-- reponse_fr -->
            <div class="control-group {{ $errors->has('reponse_fr') ? 'error' : '' }}">
                <label class="control-label" for="reponse_fr">Réponse</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="reponse_fr" id="reponse_fr" value="reponse_fr" rows="10">{{ Input::old('reponse_fr', $question->reponse_fr) }}</textarea>
                    {{ $errors->first('reponse_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ reponse_fr -->

            <!-- title_fr -->
            <div class="control-group {{ $errors->has('title_fr') ? 'error' : '' }}">
                <label class="control-label" for="title_fr">Titre</label>
                <div class="controls">
                    <input type="text" name="title_fr" id="title_fr" class="span10" value="{{ Input::old('title_fr', $question->title_fr) }}" />
                    {{ $errors->first('title_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ title_fr -->

            <!-- keywords_fr -->
            <div class="control-group {{ $errors->has('keywords_fr') ? 'error' : '' }}">
                <label class="control-label" for="keywords_fr">Keywords</label>
                <div class="controls">
                    <textarea class="full-width span10" name="keywords_fr" id="keywords_fr" value="keywords_fr" rows="5">{{ Input::old('keywords_fr', $question->keywords_fr) }}</textarea>
                    {{ $errors->first('keywords_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ keywords_fr -->
        </div>
        <!-- ./ meta French -->

        <!-- Tab english -->
        <div class="tab-pane" id="tab-english">
            <!-- question_en -->
            <div class="control-group {{ $errors->has('question_en') ? 'error' : '' }}">
                <label class="control-label" for="question_en">Question</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="question_en" id="question_en" value="question_en" rows="10">{{ Input::old('question_en', $question->question_en) }}</textarea>
                    {{ $errors->first('question_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ question_en -->

            <!-- reponse_en -->
            <div class="control-group {{ $errors->has('reponse_en') ? 'error' : '' }}">
                <label class="control-label" for="reponse_en">Response</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="reponse_en" id="reponse_en" value="reponse_en" rows="10">{{ Input::old('reponse_en', $question->reponse_en) }}</textarea>
                    {{ $errors->first('reponse_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ reponse_en -->

            <!-- title_en -->
            <div class="control-group {{ $errors->has('title_en') ? 'error' : '' }}">
                <label class="control-label" for="title_en">Title</label>
                <div class="controls">
                    <input type="text" name="title_en" id="title_en" class="span10" value="{{ Input::old('title_en', $question->title_en) }}" />
                    {{ $errors->first('title_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ title_en -->

            <!-- keywords_en -->
            <div class="control-group {{ $errors->has('keywords_en') ? 'error' : '' }}">
                <label class="control-label" for="keywords_en">Keywords</label>
                <div class="controls">
                    <textarea class="full-width span10" name="keywords_en" id="keywords_en" value="keywords_en" rows="5">{{ Input::old('keywords_en', $question->keywords_en) }}</textarea>
                    {{ $errors->first('keywords_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ keywords_en -->
        </div>
        <!-- ./ Tab english -->
        <!-- tab remarques -->
        <div class="tab-pane" id="tab-remarques">

            <!-- remarque 1 -->
            <div class="control-group {{ $errors->has('remarque1') ? 'error' : '' }}">
                <label class="control-label" for="remarque1">Remarque #1</label>
                <div class="controls">
                    <textarea class="full-width span10" name="remarque1" id="remarque1" value="remarque1" rows="5">{{ Input::old('remarque1', $question->remarque1) }}</textarea>
                    {{ $errors->first('remarque1', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ remarque1 -->

            <!-- remarque2 -->
            <div class="control-group {{ $errors->has('remarque2') ? 'error' : '' }}">
                <label class="control-label" for="remarque2">Remarque #2</label>
                <div class="controls">
                    <textarea class="full-width span10" name="remarque2" id="remarque2" value="remarque2" rows="5">{{ Input::old('remarque2', $question->remarque2) }}</textarea>
                    {{ $errors->first('remarque2', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ remarque2 -->
        </div>
        <!-- ./ tab remarque -->

    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="control-group">
        <div class="controls">
            <!-- <a class="btn btn-link" href="{{ URL::to('admin/questions') }}">Cancel</a> -->
            <a href="#modalDelete" role="button" data-toggle="modal" class="btn btn-danger">{{ Lang::get('button.delete') }}</a>
            <button type="submit" class="btn btn-success">{{ Lang::get('button.edit') }}</button>
        </div>
    </div>
    <!-- ./ form actions -->

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
$(document).ready(function() {
    $('.wysihtml5-textarea').wysihtml5();
});
</script>
@stop
