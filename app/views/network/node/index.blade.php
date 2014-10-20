<?php $refreshes = array('0' => 'Manually', '15' => 'Every 15 seconds', '30' => 'Every 30 seconds', '60' => 'Every minute', '120' => 'Every 2 minutes', '300' => 'Every 5 minutes') ?>
@extends('layouts.default')

@section('styles')
	@parent
	{{ HTML::style('css/datatables.bootstrap.css') }}
	{{ HTML::style('css/datatables.responsive.css') }}
@stop

@section('content')

<div class="page-header">
	<h3>
		<i class="glyphicon glyphicon-tasks"></i> @lang('network.node.list.title')
		<small>@lang('network.node.list.subtitle')</small>
	</h3>
</div>

<div class="row toolbar">
	<div class="col-lg-9">
		<div class="btn-group">
			<button role="create" type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-plus"></span> @lang('Create')
			</button>
			<button role="delete" type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-trash"></span> @lang('Delete')
			</button>
		</div>
	</div>
	
	<div class="col-lg-3">
		<div class="btn-group pull-right">
			<div class="input-group">
				<span class="input-group-btn">
					<button role="refresh" type="button" class="btn btn-default">
						<i class="glyphicon glyphicon-refresh"></i>
					</button>
				</span>
				{{ Form::select('node-refresh', $refreshes, 120, array('id' => 'node-refresh', 'class' => 'form-control')) }}
			</div>
		</div>
	</div>
</div>

<br />

<table class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th>{{Form::checkbox('all', NULL)}}</th>
			<th data-class="expand">@lang('Name')</th>
			<th>@lang('MAC')</th>
			<th data-hide="phone">@lang('Location')</th>
			<th data-hide="phone,tablet">@lang('Clients')</th>
			<th data-hide="phone,tablet">@lang('RX/TX Bytes')</th>
			<th>@lang('Status')</th>
			<th data-hide="phone,tablet">@lang('Last Log')</th>
			<th>@lang('Actions')</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>

@include('network.node.delete')

@stop

@section('scripts')
	@parent
	{{ HTML::script('js/jquery.datatables.min.js') }}
	{{ HTML::script('js/datatables.bootstrap.js') }}
	{{ HTML::script('js/datatables.responsive.js') }}
	{{ HTML::script('js/datatables.meshboard.js') }}
	{{ HTML::script('js/app.js') }}

	{{ HTML::script('js/network/node/index.js') }}
@stop