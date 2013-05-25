@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Create a New Question
@stop

{{-- Content --}}
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

{{ Form::open(array('url' => 'admin/questions/create', 'class' => 'form-horizontal')) }}
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- Tab General -->
        <div class="tab-pane active" id="tab-general">
            <!-- Question priority -->
            <div class="control-group {{ $errors->has('priority') ? 'error' : '' }}">
                <label class="control-label" for="priority">Priority</label>
                <div class="controls">
                    <input type="text" name="priority" id="priority" value="{{ Input::old('priority', '50') }}" />
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
                            <option value="{{ $category->id }}" <?php echo (Input::old('category')) ? 'selected' :''; ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('category', '<span class="help-inline">:message</span>') }}
                    <!-- end category1 -->

                     <select name="category2" id="category2">
                        <option value="0">Category 2 (none)</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" <?php echo (Input::old('category2')) ? 'selected' :''; ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('category2', '<span class="help-inline">:message</span>') }}
                    <!-- end category2 -->

                    <select name="category3" id="category3">
                        <option value="0">Category 3 (none) </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" <?php echo (Input::old('category3')) ? 'selected' :''; ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('category3', '<span class="help-inline">:message</span>') }}
                    <!-- end category3 -->
                </div>

            </div>
            <!-- ./ Question category -->

            <!-- Question actif -->
            <div class="control-group {{ $errors->has('actif') ? 'error' : '' }}">
                <label class="control-label" for="actif">Actif</label>
                <div class="controls">
                    <input type="checkbox" name="actif" id="actif" <?php echo (Input::old('actif')) ? 'checked' : ''; ?> />
                    {{ $errors->first('actif', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ Question actif -->

            <!-- Question public -->
            <div class="control-group {{ $errors->has('public') ? 'error' : '' }}">
                <label class="control-label" for="public">public</label>
                <div class="controls">
                    <input type="checkbox" name="public" id="public" <?php echo (Input::old('public')) ? 'checked' : ''; ?> />
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
                    <textarea class="full-width span10 wysihtml5-textarea" name="question_fr" id="question_fr" value="question_fr" rows="10">{{ Input::old('question_fr') }}</textarea>
                    {{ $errors->first('question_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ question_fr -->

            <!-- reponse_fr -->
            <div class="control-group {{ $errors->has('reponse_fr') ? 'error' : '' }}">
                <label class="control-label" for="reponse_fr">Réponse</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="reponse_fr" id="reponse_fr" value="reponse_fr" rows="10">{{ Input::old('reponse_fr') }}</textarea>
                    {{ $errors->first('reponse_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ reponse_fr -->

            <!-- title_fr -->
            <div class="control-group {{ $errors->has('title_fr') ? 'error' : '' }}">
                <label class="control-label" for="title_fr">Titre</label>
                <div class="controls">
                    <input type="text" name="title_fr" id="title_fr" class="span10" value="{{ Input::old('title_fr') }}" />
                    {{ $errors->first('title_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ title_fr -->

            <!-- keywords_fr -->
            <div class="control-group {{ $errors->has('keywords_fr') ? 'error' : '' }}">
                <label class="control-label" for="keywords_fr">Keywords</label>
                <div class="controls">
                    <textarea class="full-width span10" name="keywords_fr" id="keywords_fr" value="keywords_fr" rows="5">{{ Input::old('keywords_fr') }}</textarea>
                    {{ $errors->first('keywords_fr', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ keywords_fr -->
        </div>
        <!-- ./ meta French -->

        <!-- tab english -->
        <div class="tab-pane" id="tab-english">
            <!-- question_en -->
            <div class="control-group {{ $errors->has('question_en') ? 'error' : '' }}">
                <label class="control-label" for="question_en">Question</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="question_en" id="question_en" value="question_en" rows="10">{{ Input::old('question_en') }}</textarea>
                    {{ $errors->first('question_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ question_en -->

            <!-- reponse_en -->
            <div class="control-group {{ $errors->has('reponse_en') ? 'error' : '' }}">
                <label class="control-label" for="reponse_en">Response</label>
                <div class="controls">
                    <textarea class="full-width span10 wysihtml5-textarea" name="reponse_en" id="reponse_en" value="reponse_en" rows="10">{{ Input::old('reponse_en') }}</textarea>
                    {{ $errors->first('reponse_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ reponse_en -->

            <!-- title_en -->
            <div class="control-group {{ $errors->has('title_en') ? 'error' : '' }}">
                <label class="control-label" for="title_en">Title</label>
                <div class="controls">
                    <input type="text" name="title_en" id="title_en" class="span10" value="{{ Input::old('title_en') }}" />
                    {{ $errors->first('title_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ title_en -->

            <!-- keywords_en -->
            <div class="control-group {{ $errors->has('keywords_en') ? 'error' : '' }}">
                <label class="control-label" for="keywords_en">Keywords</label>
                <div class="controls">
                    <textarea class="full-width span10" name="keywords_en" id="keywords_en" value="keywords_en" rows="5">{{ Input::old('keywords_en') }}</textarea>
                    {{ $errors->first('keywords_en', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ keywords_en -->
        </div>
        <!-- ./ tab english -->
        <!-- tab remarques -->
        <div class="tab-pane" id="tab-remarques">

            <!-- remarque 1 -->
            <div class="control-group {{ $errors->has('remarque1') ? 'error' : '' }}">
                <label class="control-label" for="remarque1">Remarque #1</label>
                <div class="controls">
                    <textarea class="full-width span10" name="remarque1" id="remarque1" value="remarque1" rows="5">{{ Input::old('remarque1') }}</textarea>
                    {{ $errors->first('remarque1', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ remarque1 -->

            <!-- remarque2 -->
            <div class="control-group {{ $errors->has('remarque2') ? 'error' : '' }}">
                <label class="control-label" for="remarque2">Remarque #2</label>
                <div class="controls">
                    <textarea class="full-width span10" name="remarque2" id="remarque2" value="remarque2" rows="5">{{ Input::old('remarque2') }}</textarea>
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
            <button type="submit" class="btn btn-success">Publish</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop

@section('scripts')
<script>
$(document).ready(function() {
    $('.wysihtml5-textarea').wysihtml5();
});
</script>
@stop
