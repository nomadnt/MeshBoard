<div id="dialog-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@lang('common.modal.delete.title')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('common.modal.delete.body', array('elements' => '(<span>0</span>)'))</p>
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