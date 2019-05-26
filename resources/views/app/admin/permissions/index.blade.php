@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Manage Permissions</span>
        
        <button type="button" class="btn btn-primary tw-block" data-toggle="modal" data-target="#createNewPermissionModal">
            Create Permission
        </button>        
    </div>

    <div class="tw-p-4 tw-border-b tw-border-gray-300 tw-border-solid">
        <input type="text" placeholder="Search permissions..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($permissions as $permission)

                <li class="list-group-item">
                    <div class="tw-flex tw-justify-between tw-items-center">
                        <div>
                            <p class="tw-text-xl tw-m-0 tw-text-gray-800">{{ $permission->display_name }}</p>
                            <small class="text-muted">{{ $permission->description }} ({{ $permission->name }})</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#permission-edit-{{ $permission->id }}"
                                aria-expanded="false">
                                Edit Permission
                            </button>
                            <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                                data-target="#permission-roles-{{ $permission->id }}" aria-expanded="false">
                                View Roles
                            </button>
                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="permission-edit-{{ $permission->id }}">
                        <div class="card card-body">

                            @include('app.admin.permissions.partials.edit-form')

                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="permission-roles-{{ $permission->id }}">
                        <div class="card card-body">
                            <div>
                                @forelse ($permission->roles as $role)
                                    <span class="badge badge-secondary font-light tw-p-2">{{ $role->name }}</span>
                                @empty
                                    Not Attached to any Roles
                                @endforelse
                            </div>
                        </div>
                    </div>
                </li>

            @empty

                <li class="list-group-item">
                    No permission created yet.
                </li>

            @endforelse

        </ul>

    </div>

</div>

@include('app.admin.permissions.partials.add-modal')

@endsection
