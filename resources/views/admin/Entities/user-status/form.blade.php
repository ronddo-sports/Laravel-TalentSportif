<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    {!! Form::label('nom', 'Nom', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('groupe') ? 'has-error' : ''}}">
    {!! Form::label('groupe', 'Groupe *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('groupe', ['Sportif', 'Acteurs', 'Centre', 'Agent', 'Organisation', 'Federation', 'Intitut'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('groupe', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('type', null, ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}
<div class="form-group {{ $errors->has('logo_url') ? 'has-error' : ''}}">
    {!! Form::label('logo_url', 'Image *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('logo_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    {!! Form::label('enabled', 'Enabled', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('enabled', '1') !!} Yes</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('enabled', '0', true) !!} No</label>
        </div>
        {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
