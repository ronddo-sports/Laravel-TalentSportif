<div class="form-group {{ $errors->has('discr') ? 'has-error' : ''}}">
    {!! Form::label('discr', 'Discr', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('discr', ['baniere', 'profile'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('discr', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('del') ? 'has-error' : ''}}">
    {!! Form::label('del', 'Del', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('del', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('del', '0', true) !!} No</label>
</div>
        {!! $errors->first('del', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    {!! Form::label('active', 'Active', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('active', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('active', '0', true) !!} No</label>
</div>
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
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
