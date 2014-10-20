<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body style="font-family:Arial, Helvetica, sans-serif;">
		<h3>{{ trans('network.nodes.alert', array('network' => $network->name)) }}</h3>
		<p>Last check at: {{ date('Y-m-d H:i:s') }}</p>
		<table style="width:100%; border-collapse:collapse;" border="1">
			<thead>
				<tr>
					<th>{{ trans('Name') }}</th>
					<th>{{ trans('Mac') }}</th>
					<th>{{ trans('Location') }}</th>
					<th>{{ trans('Checkin') }}</th>
				</tr>
			</thead>
			@foreach($nodes as $node)
			<tr>
				<td>{{ $node['name'] }}</td>
				<td>{{ $node['mac'] }}</td>
				<td>{{ $node['location'] }}</td>
				<td align="center">{{ $node['checkin'] }}</td>
			</tr>
			@endforeach
		</table>
		<p>{{ URL::to('network', array('id' => $network->id)) }}</p>
	</body>
</html>
