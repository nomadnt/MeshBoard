@extends('layouts.default')

@section('sidebar')
	@parent
@stop

@section('content')
<div class="page-header">
    <h3>
       	<i class="glyphicon glyphicon-cog"></i> {{trans('Network Settings')}}
       	<small>{{trans('Edit your network settings')}}</small>
   	</h3>
</div>
{{ Form::model($network, array('route' => $route, 'role' => 'form', 'files' => TRUE, 'class' => 'form-horizontal')) }}
{{ Form::hidden('_method', $method) }}
{{ Form::hidden('lat') }}
{{ Form::hidden('lng') }}

<div class="alert-pane">
	<div class="alert hide"></div>
</div>

<!-- Tab nav -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#general" data-toggle="tab">{{ trans('General') }}</a></li>
	<!--<li><a href="#network" data-toggle="tab">{{ trans('Network') }}</a></li>-->
	<li><a href="#wireless" data-toggle="tab">{{ trans('Wireless') }}</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="general">
		<div class="form-group">
  			<label for="name" class="col-lg-2 control-label">{{ trans('Name') }}</label>
    		<div class="col-lg-3">{{ Form::text('name', NULL, array('class' => 'form-control')) }}</div>
    		<div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="name" class="col-lg-2 control-label">{{ trans('Country') }}</label>
		    <div class="col-lg-3">{{ Form::text('country', NULL, array('class' => 'form-control')) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="name" class="col-lg-2 control-label">{{ trans('Timezone') }}</label>
		    <div class="col-lg-3">{{ Form::text('timezone', NULL, array('class' => 'form-control')) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="location" class="col-lg-2 control-label">{{ trans('Location') }}</label>
		    <div class="col-lg-3">{{ Form::text('location', NULL, array('class' => 'form-control', 'placeholder' => trans('Network location'))) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<!--<div class="form-group">
		   	<label for="location" class="col-lg-2 control-label">{{ trans('Location') }}</label>
		   	<div class="col-lg-3">
				<div class="input-group">
					{{ Form::text('location', NULL, array('class' => 'form-control', 'placeholder' => trans('Network location'))) }}
					<span class="input-group-btn">
						<button type="button" class="btn btn-default">
							<i class="glyphicon glyphicon-map-marker"></i>
						</button>
					</span>
				</div>
			</div>
			<div class="col-lg-3"></div>
			<div class="col-lg-7"><span class="help-block"></span></div>
		</div>--->

		<div class="form-group">
			<label class="col-lg-2 control-label" for="password">{{ trans('Password') }}</label>
			<div class="col-lg-3">
				<div class="input-group">
					{{ Form::input('password', 'password', $network->password, array('class' => 'form-control', 'placeholder' => trans('Network password'))) }}
					<span class="input-group-btn">
						<button type="button" data-toggle="password" data-target="password" class="btn btn-default">
							<i class="glyphicon glyphicon-eye-open"></i>
						</button>
					</span>
				</div>
			</div>
			<div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<!--<div class="form-group">
			<label class="col-lg-2 control-label" for="logo">{{ trans('Logo') }}</label>
			<div class="col-lg-3">
				<div class="input-group">
					{{ Form::file('logo', array('class' => 'hide')) }}
					{{ Form::text('_logo', NULL, array(
						'class' => 'form-control', 'disabled' => 'disabled', 'placeholder' => trans('Please select a file')
					)) }}
					<span class="input-group-btn">
						<button data-toggle="upload" data-target="logo" data-container="_logo" class="btn btn-default" type="button">
							<i class="glyphicon glyphicon-folder-open"></i>
						</button>
					</span>
				</div>
			</div>
			<div class="col-lg-7">
				<span class="help-block"></span>
			</div>
		</div>-->
	</div>

	<!--<div class="tab-pane" id="network"></div>-->
	<div class="tab-pane" id="wireless">
		<div class="form-group">
		  	<label for="channel_2" class="col-lg-2 control-label">{{ trans('2.4 GHz Channel') }}</label>
		    <div class="col-lg-3">{{ Form::select('channel_2', Wireless::channels('2.4'), NULL, array('class' => 'form-control')) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="channel_5" class="col-lg-2 control-label">{{ trans('5 GHz Channel') }}</label>
		    <div class="col-lg-3">{{ Form::select('channel_5', Wireless::channels('5'), NULL, array('class' => 'form-control')) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="encryption" class="col-lg-2 control-label">{{ trans('Mesh Encryption') }}</label>
		    <div class="col-lg-3">{{ Form::select('encryption', array(trans('Disabled'), trans('Enabled')), NULL, array('class' => 'form-control')) }}</div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group">
		  	<label for="cfg[wireless][_lap0][disabled]" class="col-lg-2 control-label">{{ trans('LAN AP') }}</label>
		    <div class="col-lg-3">
		    	{{ Form::select('cfg[wireless][_lap0][disabled]', array(trans('Enabled'), trans('Disabled')), object_get($network, 'cfg.wireless._lap0.disabled', 1), array(
		    		'id' => 'lap', 'class' => 'form-control')) 
		    	}}
		    </div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group lap">
		  	<label for="cfg[wireless][_lap0][ssid]" class="col-lg-2 control-label">{{ trans('LAN AP SSID') }}</label>
		    <div class="col-lg-3">
		    	{{ Form::text('cfg[wireless][_lap0][ssid]', object_get($network, 'cfg.wireless._lap0.ssid'), array(
		    		'class' => 'form-control', 'placeholder' => trans('LAN Access Point SSID'))) 
		    	}}
		    </div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>

		<div class="form-group lap">
		  	<label for="cfg[wireless][_lap0][key]" class="col-lg-2 control-label">{{ trans('LAN AP Key') }}</label>
		    <div class="col-lg-3">
		    	<div class="input-group">
		    		{{ Form::input('password', 'cfg[wireless][_lap0][key]', object_get($network, 'cfg.wireless._lap0.key'), array(
			    		'id' => 'lap', 'class' => 'form-control', 'placeholder' => trans('LAN Access Point Key')
		    		)) }}
		    		<span class="input-group-btn">
						<button type="button" data-toggle="password" data-target="cfg[wireless][_lap0][key]" class="btn btn-default">
							<i class="glyphicon glyphicon-eye-open"></i>
						</button>
					</span>
				</div>
		    </div>
		    <div class="col-lg-7"><span class="help-block"></span></div>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-10">
		<a href="{{ url('network') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-remove"></i> {{ trans('Cancel') }}
		</a>
		<button type="submit" class="btn btn-primary">
			<i class="glyphicon glyphicon-ok"></i> {{ trans('Save') }}
		</button>
	</div>
</div>
{{ Form::close() }}
@stop

@section('scripts')
	@parent
	{{ HTML::script('js/jquery.form.min.js') }}
	{{ HTML::script('js/app.js') }}
	{{ HTML::script('js/network/create.js') }}
@stop