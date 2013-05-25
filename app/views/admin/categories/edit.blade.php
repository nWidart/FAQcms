@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Update a Category
@stop

{{-- Content --}}
@section('content')
<div class="row">a</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <!-- ./ csrf token -->
    <!-- Question name -->
    <div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
        <label class="control-label" for="name">Name</label>
        <div class="controls">
            <input type="text" name="name" id="name" value="{{ Input::old('name', $category->name) }}" />
            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
        </div>
    </div>
    <!-- ./ Question name -->

    <!-- Form Actions -->
    <div class="control-group">
        <div class="controls">
            <a href="#modalDelete" role="button" data-toggle="modal" class="btn btn-danger">{{ Lang::get('button.delete') }}</a>
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </div>
    <!-- ./ form actions -->

</form>

<div class="modal small hide fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmation de suppresion</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Etes vous sur de vouloir supprimer la catégorie? Ceci suprimera toutes les questions dans cette catégorie.</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
        <a href="{{ URL::to('admin/categories/' . $category->id . '/delete') }}">
            <button class="btn btn-danger">Suprimmer</button>
        </a>
    </div>
</div>
@stop
