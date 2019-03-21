<!-- Create New Role Modal -->
<div class="modal fade" id="createNewRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="{{ route('app.admin.acl.roles.store') }}" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    @csrf

                    <div class="form-group">
                        <label class="mr-2">Role Name</label>
                        <input class="form-control" type="text" name="name" required autocomplete="false">
                    </div>

                    @if ($errors->has('name'))

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>

                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
