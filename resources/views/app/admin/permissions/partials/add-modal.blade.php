<!-- Create New Permissions Modal -->
<div class="modal fade" id="createNewPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="{{ route('app.admin.acl.permissions.store') }}" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create New Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    @csrf

                    <div class="form-group">
                        <label class="mr-2">Permission Name</label>
                        <input class="form-control" type="text" name="name" placeholder="resource:action" required
                            autocomplete="false">
                    </div>

                    @if ($errors->has('name'))

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>

                    @endif

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="resource_permission">
                        <label class="form-check-label" name="resource_permission">Resourceful Permission</label>
                        <small class="block mt-1">
                            Creates all CRUD actions (create, view, update, destroy) for a resource.
                        </small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Permission</button>
                </div>

            </form>

        </div>
    </div>
</div>
