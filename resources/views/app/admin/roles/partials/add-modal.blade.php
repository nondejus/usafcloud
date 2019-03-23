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
                        <input class="form-control" type="text" name="name" required autocomplete="false"
                            placeholder="organization:admin">
                        @if ($errors->has('name'))

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>

                        @endif
                    </div>

                    <div class="form-group">
                        <label class="mr-2">Role Display Name</label>
                        <input class="form-control" type="text" name="display_name" required autocomplete="false"
                            placeholder="Organization Admin">
                        @if ($errors->has('display_name'))

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>

                        @endif
                    </div>

                    <div class="form-group">
                        <label class="mr-2">Role Description</label>
                        <input class="form-control" type="text" name="description" required autocomplete="false">
                        @if ($errors->has('description'))

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>

                        @endif
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
