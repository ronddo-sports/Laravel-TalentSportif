<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        {!! $errors->first('content', 'messenger') !!}
    </div>
</div><div class="form-group {{ $errors->has('exped_id') ? 'has-error' : ''}}">
    {!! Form::label('exped_id', 'Exped Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('exped_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('exped_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('recep_id') ? 'has-error' : ''}}">
    {!! Form::label('recep_id', 'Recep Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('recep_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('recep_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('est_lu') ? 'has-error' : ''}}">
    {!! Form::label('est_lu', 'Est Lu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
    <label>{!! Form::radio('est_lu', '1') !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('est_lu', '0', true) !!} No</label>
</div>
        {!! $errors->first('est_lu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
