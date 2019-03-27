<!-- Modal -->
<div class="modal fade" id="addUserToOrganization" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User to Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('app.admin.organizations.members.store', $organization) }}" method="POST">

                <div class="modal-body">

                    @csrf

                    <div class="form-group">
                        <label for="">Choose a User</label>
                        <select class="form-control" name="user_id">
                            @forelse ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>

            </form>

        </div>
    </div>
</div>
