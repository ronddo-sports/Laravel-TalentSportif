<div class="form-group {{ $errors->has('couleur') ? 'has-error' : ''}}">
    {!! Form::label('couleur', 'Couleur', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('couleur', ['jaune', 'rouge', 'vert'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('couleur', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('media_id') ? 'has-error' : ''}}">
    {!! Form::label('media_id', 'Media Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('media_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('media_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
