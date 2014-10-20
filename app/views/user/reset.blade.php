@extends('layouts.default')

@section('navbar')
@overwrite

@section('content')
  <div class="panel panel-default panel-signin">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> {{ trans('Password reset') }}</div>
      <div class="panel-body">
        {{ Form::open(array('url' => 'user/reset', 'class' => 'form-signin', 'autocomplete' => 'off')) }}
          @if($error = Session::get('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button> {{ $error }}
          </div>
          @endif
          {{ Form::hidden('token', $token) }}
          {{ Form::email('email', Input::get('email'), array('class' => 'form-control', 'placeholder' => trans('Email Address'))) }}<br />
          {{ Form::password('password', array('class' => 'form-control collapse-top', 'placeholder' => trans('Password'))) }}
          {{ Form::password('password_confirmation', array('class' => 'form-control collapse-bottom', 'placeholder' => trans('Password confirmation'))) }}
          <a href="{{ url('user/login') }}" class="btn-block btn-link text-right">
            <small>{{ trans('Back to login') }}</small>
          </a>
          {{ Form::submit(trans('Continue'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@stop