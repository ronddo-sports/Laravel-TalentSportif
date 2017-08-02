<div class="form-group {{ $errors->has('president') ? 'has-error' : ''}}">
    {!! Form::label('president', 'President', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('president', null, ['class' => 'form-control']) !!}
        {!! $errors->first('president', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('federation_id') ? 'has-error' : ''}}">
    {!! Form::label('federation_id', 'Federation Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('federation_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('federation_id', '<p class="help-block">:message</p>') !!}
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
