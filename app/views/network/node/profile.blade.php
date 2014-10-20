@extends('layouts.master')

@section('sidebar')
	@parent

	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="glyphicon glyphicon-user"></i>
					<?php //echo strtoupper(Auth::instance()->get_user()->username)?>
				</a>
				<ul class="dropdown-menu">
					<li>{{ action('user/index', '<i class="glyphicon glyphicon-cog"></i>'.trans('Account settings')) }}
					</li>
					<li class="divider"></li>
					<li>
						<?php //echo HTML::anchor('auth/logout', '<i class="glyphicon glyphicon-off"></i>'.__('Logout'))?>
					</li>
				</ul>
			</li>
		</ul>
	</div>
@stop

@section('content')
    <p>This is my body content.</p>
    {{ Form::open(array('url' => 'node/bar')) }}
    {{ Form::text('name') }}
    {{ Form::text('contry') }}
    {{ Form::text('timezone') }}
    {{ Form::text('location') }}
    {{ Form::text('lat') }}
    {{ Form::text('lng') }}
    {{ Form::text('password') }}
    {{ Form::text('channel_2') }}
    {{ Form::text('channel_5') }}
	{{ Form::close() }}
@stop