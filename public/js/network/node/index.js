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
			{data: 'mac', searchable: true, orderable: false},
			{data: 'location', searchable: true, orderable: true},
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
			{
				data: 'status', 
				className: 'text-center', 
				render: function(data, type, row, meta){
					var data = (100 * data) / 255;
					var cls = 'default';
					var status = 'off line';
				
					if(row.is_alive){
						status = 'on line';
						console.log(row);
						if(row.role == 'B'){
							if(data < 30) cls = 'danger';
							if(data > 30 && data < 70) cls = 'warning';
							if(data > 70) cls = 'success';
						}else if(row.role == 'G'){
							cls = 'primary'
						}
					}

					var el = $('<span/>').addClass('label label-block label-' + cls).html(status);
					
					return el.get(0).outerHTML;
				}
			},
			{data: 'lastlog'},
			{data: 'actions'}
		]
	});

	$('button[role="refresh"]').click(function(){
		return oTable.DataTable().draw(false);
	});

	$('#node-refresh').change(function(){
		clearInterval(polling);
		polling = setInterval('oTable.DataTable().draw(false);', ($(this).val() * 1000));
	}).change();

	$('button[role="create"]').click(function(e){
		e.preventDefault();
		location.href = location.href + '/create';
		return false;
	});

	$('button[role="delete"]').click(function(e){
		e.preventDefault();
		var elements = [];
		oTable.find('tbody tr :checkbox[name="id[]"]').each(function(i, e){
			if($(e).is(':checked')) elements.push(parseInt($(e).val()));
		});

		if(elements.length > 0) return node_delete(elements);
	});
});

function node_delete(elements){
	if(!$.isArray(elements)) elements = [elements];

	$('#node-delete .modal-body span').html(elements.length);
	$('#node-delete').modal('show');
	$('#node-delete button[role="confirm"]').click(function(e){
		$.ajax({
			url: location.href + '/delete',
			type: 'POST',
			data: {id: elements},
			success: function(data, status, xhr){
				$('#node-delete').modal('hide');
				oTable.DataTable().draw();
			},
			error: function(xhr, status, error){
				console.log(xhr, status, error);
			}
		});
	});
	return true;
}

function node_edit(id){
	location.href += '/' + id + '/edit';
	return true;
}