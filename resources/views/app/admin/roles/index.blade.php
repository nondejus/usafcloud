@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Roles</span>
        <div>
            <button class="btn btn-primary btn-rounded">Create Role</button>
        </div>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($roles as $role)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <p class="text-xl m-0 text-grey-darker">{{ $role->name }}</p>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-1" type="button" data-toggle="collapse"
                            data-target="#role-edit-{{ $role->id }}" aria-expanded="false">
                            Edit Role
                        </button>
                        <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                            data-target="#role-permissions-{{ $role->id }}" aria-expanded="false">
                            View Permissions
                        </button>
                    </div>
                </div>
                <div class="collapse mt-3" id="role-edit-{{ $role->id }}">
                    <div class="card card-body">
                        Edit form...
                    </div>
                </div>
                <div class="collapse mt-3" id="role-permissions-{{ $role->id }}">
                    <div class="card card-body">
                        <div>
                            @forelse ($role->permissions as $permission)
                            <span class="badge badge-secondary font-light p-2 mb-1">{{ $permission->name }}</span>
                            @empty
                            No Permissions Attached
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

@endsection
