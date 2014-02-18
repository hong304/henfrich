@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'register', 'class' => 'form-signin', 'role' => 'form')) }}
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    {{ Form::text('firstname', '', array('class'=>'form-control','required'=>'') ) }}
                    <span class="validation">{{{ $errors->first('firstname') }}}</span>
                </div>
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
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                <br>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop