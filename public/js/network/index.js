var oTable = null;
var polling = null;

$(document).ready(function(){
	oTable = $('.table').dataTable({
		autoWidth: false,
		//processing: true,
		serverSide: true,
		ajax: location.href,
		columns : [
			{data: 'id', searchable: true},
			{data: 'name', searchable: true, orderable: true},
			{data: 'location', searchable: true, orderable: true},
			{
				data: 'nodes', 
				searchable: false, 
				orderable: false,
				className: 'text-center',
				render: function(data, type, row, meta){
					return data.alives + '/' + data.total;
				}
			},
			{data: 'clients', searchable: false, orderable: false, className: 'text-center'},
			{
				data: 'bytes', 
				searchable: false, 
				orderable: false,
				className: 'text-center',
				render : function(data, type, row, meta){
					return data.rx + ' / ' + data.tx;
				}
			},
			{data: 'actions'}
		]
	});

	$('button[role="refresh"]').click(function(){
		return oTable.DataTable().draw(false);
	});

	$('#networks-refresh').change(function(){
		clearInterval(polling);
		polling = setInterval('oTable.DataTable().draw(false);', ($(this).val() * 1000));
	}).change();

	$('button[role="create"]').click(function(e){
		e.preventDefault();
		location.href = 'network/create';
		return false;
	});

	$('button[role="delete"]').click(function(e){
		e.preventDefault();
		var elements = [];
		oTable.find('tbody tr :checkbox[name="id[]"]').each(function(i, e){
			if($(e).is(':checked')) elements.push(parseInt($(e).val()));
		});

		if(elements.length > 0) return network_delete(elements);
	});
});

function network_delete(elements){
	if(!$.isArray(elements)) elements = [elements];

	$('#network-delete .modal-body span').html(elements.length);
	$('#network-delete').modal('show');
	$('#network-delete button[role="confirm"]').click(function(e){
		$.ajax({
			url: 'network/delete',
			type: 'POST',
			data: {id: elements},
			success: function(data, status, xhr){
				$('#network-delete').modal('hide');
				oTable.DataTable().draw();
			},
			error: function(xhr, status, error){
				console.log(xhr, status, error);
			}
		});
	});
	return true;
}

function network_edit(id){
	location.href = 'network/' + id + '/edit';
	return true;
}

function network_nodes(id){
	location.href = 'network/' + id + '/node';
	return true;
}