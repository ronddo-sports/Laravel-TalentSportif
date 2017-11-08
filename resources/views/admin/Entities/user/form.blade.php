<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pseudo') ? 'has-error' : ''}}">
    {!! Form::label('pseudo', 'Pseudo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pseudo', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pseudo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('email', 'messenger') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('confirmation_token') ? 'has-error' : ''}}">
    {!! Form::label('confirmation_token', 'Confirmation Token', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('confirmation_token', null, ['class' => 'form-control']) !!}
        {!! $errors->first('confirmation_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('remember_token') ? 'has-error' : ''}}">
    {!! Form::label('remember_token', 'Remember Token', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
        {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('password_requested_at') ? 'has-error' : ''}}">
    {!! Form::label('password_requested_at', 'Password Requested At', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('password_requested_at', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password_requested_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('last_login') ? 'has-error' : ''}}">
    {!! Form::label('last_login', 'Last Login', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('last_login', null, ['class' => 'form-control']) !!}
        {!! $errors->first('last_login', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}
<div class="form-group {{ $errors->has('date_naiss') ? 'has-error' : ''}}">
    {!! Form::label('date_naiss', 'Date Naiss', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date_naiss', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('date_naiss', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}--}}
    {{--<div class="col-md-6">--}}
        {{--{!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
        {{--{!! $errors->first('description', '<p class="help-block">:message</p>') !!}--}}
    {{--</div>--}}
{{--</div>--}}
<div class="form-group {{ $errors->has('discipline') ? 'has-error' : ''}}">
    {!! Form::label('discipline', 'Discipline', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('discipline', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('discipline', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--<div class="form-group {{ $errors->has('tel') ? 'has-error' : ''}}">
    {!! Form::label('tel', 'Tel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tel', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pays') ? 'has-error' : ''}}">
    {!! Form::label('pays', 'Pays', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pays', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pays', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('ville') ? 'has-error' : ''}}">
    {!! Form::label('ville', 'Ville', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ville', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ville', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('adresse') ? 'has-error' : ''}}">
    {!! Form::label('adresse', 'Adresse', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('status', null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}
{{--<div class="form-group {{ $errors->has('discr') ? 'has-error' : ''}}">
    {!! Form::label('discr', 'Discr', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('discr', null, ['class' => 'form-control']) !!}
        {!! $errors->first('discr', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('salt') ? 'has-error' : ''}}">
    {!! Form::label('salt', 'Salt', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('salt', null, ['class' => 'form-control']) !!}
        {!! $errors->first('salt', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    {!! Form::label('group_id', 'Group Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('group_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_status_id') ? 'has-error' : ''}}">
    {!! Form::label('user_status_id', 'User Status Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_status_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
    </div>
</div>
