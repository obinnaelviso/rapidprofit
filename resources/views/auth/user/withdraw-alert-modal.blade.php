{{-- Create new investment --}}
<div class="modal fade" id="alertWithdraw" tabindex="-1" role="dialog" aria-labelledby="alertWithdrawLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">Oops, Something went wrong!
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">
                <p>
                    @yield('alert')
                </p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
