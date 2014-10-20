@extends('layouts.default')

@section('content')
<div class="page-header">
	<h3>
		<i class="glyphicon glyphicon-cog"></i>
		{{ trans('User profile') }}
		<small>{{ trans('Edit your settings') }}</small>
	</h3>
</div>

{{ Auth::user()->hasRole('merda') }}

{{ Form::model($user, array('route' => array('api.v1.user.update', $user->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal')) }}
	<div class="alert-pane">
		<div class="alert hide"></div>	
	</div>

	<div class="form-group">
		<label for="email" class="col-lg-2 control-label">{{ trans('Email') }}</label>
		<div class="col-lg-3">
			{{ Form::email('email', NULL, array('class' => 'form-control', 'readonly' => 'readonly')) }}
		</div>
		<div class="col-lg-7">
			<span class="help-block"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="password" class="col-lg-2 control-label">{{ trans('Password') }}</label>
		<div class="col-lg-3">
			{{ Form::password('password', array('class' => 'form-control')) }}
		</div>
		<div class="col-lg-7">
			<span class="help-block"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label for="password_confirm" class="col-lg-2 control-label">{{ trans('Confirm Password') }}</label>
		<div class="col-lg-3">
			{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
		</div>
		<div class="col-lg-7">
			<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
		<label for="language" class="col-lg-2 control-label">{{ trans('Language') }}</label>
		<div class="col-lg-3">
			{{ Form::select('language', array('en' => 'English', 'it' => 'Italiano'), NULL, array('class' => 'form-control')) }}
		</div>
		<div class="col-lg-7">
			<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
		<label for="route" class="col-lg-2 control-label">{{ trans('Default Route') }}</label>
		<div class="col-lg-3">
			{{ Form::select('route', array(
				'user/profile' => 'User Profile', 
				'network' => 'Network List',
			), NULL, array('class' => 'form-control')) }}
		</div>
		<div class="col-lg-7">
			<span class="help-block"></span>
		</div>
	</div>
				
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-ok"></span> {{ trans('Save') }}
			</button>
		</div>
	</div>
{{ Form::close() }}

@stop