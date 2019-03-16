@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Users</span>
        <div>
            <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#createNewPermissionModal">
                Create New User
            </button>
        </div>
    </div>

    <div class="p-4 border-b border-grey-light border-solid">
        <input type="text" placeholder="Search users..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($users as $user)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <p class="text-xl m-0 text-grey-darker">{{ $user->name }}</p>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-2" type="button" data-toggle="collapse"
                            data-target="#user-edit-{{ $user->id }}" aria-expanded="false">
                            Edit User
                        </button>
                        <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                            data-target="#user-permissions-{{ $user->id }}" aria-expanded="false">
                            View Roles
                        </button>
                    </div>
                </div>
                <div class="collapse mt-3" id="user-edit-{{ $user->id }}">
                    <div class="card card-body">
                        Edit form...
                    </div>
                </div>
                <div class="collapse mt-3" id="user-permissions-{{ $user->id }}">
                    <div class="card card-body">
                        <div>
                            @forelse ($user->roles as $role)
                            <span class="badge badge-primary font-light p-2">{{ $role->name }}</span>
                            @empty
                            No Roles Attached
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
