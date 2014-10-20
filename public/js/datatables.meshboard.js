/* Set the defaults for DataTables initialisation */
$.extend(true, $.fn.dataTable.defaults,{
	columnDefs: [{
     	targets: 0,
      	orderable: false,
      	className: 'text-center',
      	width: '8%',
      	render: function(data, type, row, meta){
      		return $('<input>', {type: 'checkbox', name: 'id[]', value: data}).get(0).outerHTML;
		}
    },{
    	targets: -1,
    	orderable: false,
    	searchable: false,
    	width: '20%',
    	render: function(data, type, row, meta){
			var group = $('<div>', {class: 'btn-group btn-group-justified btn-group-xs'});
			$.each(data, function(i, e){
				var btn = $('<a>', {class: 'btn btn-default btn-xs'}).append($('<i>', {class: 'glyphicon ' + e.class}));
				$.each(e, function(j, k){if(j != 'class') $(btn).attr(j, k);});
				group.append(btn);
			});

			return group.get(0).outerHTML;
    	}
    }],
    preDrawCallback: function(settings, json){
		//console.log('ciao')
		if(!this.responsiveHelper)
			this.responsiveHelper = new ResponsiveDatatablesHelper(this, {tablet: 1024, phone : 480});
	},
	initComplete: function(settings, json){
		var table = this;
		$(table).find(':checkbox[name="all"]').change(function(){
			$(table).find('tbody :checkbox[name="id[]"]').prop('checked', $(this).is(':checked'));
		});
	},
    rowCallback: function(row, data){
        this.responsiveHelper.createExpandIcon(row);
    },
    drawCallback: function(settings){
        this.responsiveHelper.respond();
    }
});