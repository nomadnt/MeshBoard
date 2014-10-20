@extends('layouts.default')

@section('navbar')
@overwrite

@section('content')
  <div class="panel panel-default panel-signin">
    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> {{ trans('Password reminder') }}</div>
      <div class="panel-body">
        {{ Form::open(array('url' => 'user/remind', 'class' => 'form-signin', 'autocomplete' => 'off')) }}
          @if($error = Session::get('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button> {{ $error }}
          </div>
          @endif
          @if($status = Session::get('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button> {{ $status }}
          </div>
          @endif
          {{ Form::email('email', NULL, array('class' => 'form-control', 'placeholder' => trans('Email address'), 'required' => 'required')) }}
          <a href="{{ url('user/login') }}" class="btn-block btn-link text-right">
            <small>{{ trans('Back to login') }}</small>
          </a>              
          {{ Form::submit(trans('Continue'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@stop