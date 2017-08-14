<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('category', null, ['class' => 'form-control']) !!}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('club_actuel') ? 'has-error' : ''}}">
    {!! Form::label('club_actuel', 'Club Actuel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('club_actuel', null, ['class' => 'form-control']) !!}
        {!! $errors->first('club_actuel', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('poid') ? 'has-error' : ''}}">
    {!! Form::label('poid', 'Poid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('poid', null, ['class' => 'form-control']) !!}
        {!! $errors->first('poid', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('taille') ? 'has-error' : ''}}">
    {!! Form::label('taille', 'Taille', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('taille', null, ['class' => 'form-control']) !!}
        {!! $errors->first('taille', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('poste') ? 'has-error' : ''}}">
    {!! Form::label('poste', 'Poste', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('poste', null, ['class' => 'form-control']) !!}
        {!! $errors->first('poste', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_manager_id') ? 'has-error' : ''}}">
    {!! Form::label('user_manager_id', 'User Manager Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_manager_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_manager_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_group_id') ? 'has-error' : ''}}">
    {!! Form::label('user_group_id', 'User Group Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_group_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
