@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Permissions</span>
        <div>
            <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#createNewPermissionModal">
                Create New Permission
            </button>
        </div>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($permissions as $permission)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <p class="text-xl m-0 text-grey-darker">{{ $permission->name }}</p>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-2" type="button" data-toggle="collapse"
                            data-target="#permission-edit-{{ $permission->id }}" aria-expanded="false">
                            Edit Permission
                        </button>
                        <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                            data-target="#permission-roles-{{ $permission->id }}" aria-expanded="false">
                            View Roles
                        </button>
                    </div>
                </div>
                <div class="collapse mt-3" id="permission-edit-{{ $permission->id }}">
                    <div class="card card-body">
                        Edit form...
                    </div>
                </div>
                <div class="collapse mt-3" id="permission-roles-{{ $permission->id }}">
                    <div class="card card-body">
                        <div>
                            @forelse ($permission->roles as $role)
                            <span class="badge badge-primary font-light p-2">{{ $role->name }}</span>
                            @empty
                            Not Attached to any Roles
                            @endforelse
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <li class="list-group-item">
                No items added yet
            </li>
            @endforelse

        </ul>

    </div>

</div>

<div class="modal fade" id="createNewPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Permission</button>
            </div>
        </div>
    </div>
</div>

@endsection
