<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'Url', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('url', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('duree') ? 'has-error' : ''}}">
    {!! Form::label('duree', 'Duree', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('duree', null, ['class' => 'form-control']) !!}
        {!! $errors->first('duree', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('media_id') ? 'has-error' : ''}}">
    {!! Form::label('media_id', 'Media Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('media_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('media_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
