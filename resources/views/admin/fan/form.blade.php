<div class="form-group {{ $errors->has('star_id') ? 'has-error' : ''}}">
    {!! Form::label('star_id', 'Star Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('star_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('star_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fan_id') ? 'has-error' : ''}}">
    {!! Form::label('fan_id', 'Fan Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('fan_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
