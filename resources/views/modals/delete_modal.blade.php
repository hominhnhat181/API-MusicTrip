<!-- delete Modal -->
<form action="" method="post"  id="delete-link">
    @csrf {{method_field('delete')}}
    <div id="delete-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Delete Confirmation') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">{{ translate('Are you sure to delete this?') }}</p>
                    <button type="button" class="btn btn-link mt-2"
                        data-dismiss="modal" style="color:black">{{ translate('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary btn-rehau-success mt-2">{{ translate('Delete') }}</a>
                </div>
            </div>
        </div>
    </div>
</form>
