@extends('layouts.frontend.Layout')

@section('content')
<div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
    
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                            {!! Form::label('username', 'Nom :', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
    
                        <div class="form-group {{ $errors->has('date_naiss') ? 'has-error' : ''}}">
                            {!! Form::label('date_naiss', 'Date Naiss', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::date('date_naiss', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('date_naiss', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
    
    
                        <div class="form-group {{ $errors->has('pseudo') ? 'has-error' : ''}}">
                            {!! Form::label('pseudo', 'Pseudo', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('pseudo', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('pseudo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('discipline') ? 'has-error' : ''}}">
                            {!! Form::label('discipline', 'Discipline', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('discipline', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('discipline', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <input type="hidden" name="status_id" value="{{@$status->id}}">
                                <input type="hidden" name="discr" value="{{@$status->type}}">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            @if(isset($status))
                                <button type="submit" class="btn btn-primary">
                                    Register{{$status->id}}
                                </button>
                                @else
                                    <a href="{{route('')}}" class="btn btn-primary">Register</a>
                                        @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
