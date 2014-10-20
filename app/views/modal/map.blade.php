<div id="dialog-map" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Location Map" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">@lang('common.modal.map.title')</h4>
			</div>
			<div class="modal-body">
				<div class="input-group">
					{{ Form::text('search', NULL, array('class' => 'form-control')) }}
					<span class="input-group-btn">
    	                <button id="map-btn-geocoder" class="btn btn-default" type="button">
    	                    <i class="glyphicon glyphicon-map-marker"></i>
    	                </button>
    	            </span>
				</div>
				<!-- TODO porting on css style -->
				<div id="gmap" class="well" style="margin:35px 0 0 0; height:250px; width:100%;"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> @lang('common.close')
                </button>
                <button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> @lang('common.confirm')
                </button>
			</div>
		</div>
	</div>
</div>
