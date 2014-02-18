@extends('layouts.master')

@section('title')
FORGOTTEN PASSWORD
@stop

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reset password</h3>
            </div>
            <div class="panel-body">

                @if (Session::has('status'))
                <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                {{ Form::open(array('action' => 'RemindersController@postReset', 'class' => 'form-signin', 'role' => 'form')) }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    {{ Form::email('email', '', array('class'=>'form-control','required'=>'') ) }}
                    <span class="validation">{{{ $errors->first('email') }}}</span>
                </div>
                <div class="form-group">
                    <label for="password">New password</label>
                    {{ Form::password('password', array('class'=>'form-control','required'=>'') ) }}
                    <span class="validation">{{{ $errors->first('password') }}}</span>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm new password</label>
                    {{ Form::password('password_confirmation', array('class'=>'form-control','required'=>'') ) }}
                    <span class="validation">{{{ $errors->first('password_confirmation') }}}</span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">RESET PASSWORD</button>
                <br>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>


@stop