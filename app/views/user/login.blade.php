@extends('layouts.default')

@section('navbar')
@overwrite

@section('content')
  <div class="panel panel-default panel-signin">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> {{ trans('Restricted Area') }}</div>
      <div class="panel-body">
        {{ Form::open(array('url' => 'user/login', 'class' => 'form-signin', 'autocomplete' => 'off')) }}
          @if($error = $errors->first('password'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button> {{ $error }}
          </div>
          @endif
          {{ Form::email('email', NULL, array('class' => 'form-control collapse-top', 'placeholder' => trans('Email address'))) }}
          {{ Form::password('password', array('class' => 'form-control collapse-bottom', 'placeholder' => trans('Password'))) }}
          <div class="row">
            <div class="col-xs-6">
              <label class="checkbox">
                {{ Form::checkbox('remember', 1) }} <small>{{ trans('Remember me') }}</small>
              </label>
            </div>
            <div class="col-xs-6">
              <a href="{{ url('user/remind') }}" class="btn-block btn-link text-right">
                <small>{{ trans('Forgot your password?') }}</small>
              </a>              
            </div>
          </div>

          {{ Form::submit(trans('Sign In'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@stop