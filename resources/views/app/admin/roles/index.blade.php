@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Manage Roles</span>
        
        <button class="btn btn-primary btn-rounded tw-block" data-toggle="modal" data-target="#createNewRoleModal">
            Create Role
        </button>        
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($roles as $role)
                
                <li class="list-group-item">

                    <div class="tw-flex tw-justify-between tw-items-center">
                        
                        <div>
                            <p class="tw-text-xl tw-m-0 tw-text-gray-800">{{ $role->display_name }}</p>
                            <small class="text-muted">{{ $role->description }} ({{$role->name }})</small>
                        </div>

                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#role-edit-{{ $role->id }}" aria-expanded="false">
                                Edit Role
                            </button>
                            <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                                data-target="#role-permissions-{{ $role->id }}" aria-expanded="false">
                                View Permissions
                            </button>
                        </div>

                    </div>
                    
                    <div class="collapse tw-mt-3" id="role-edit-{{ $role->id }}">
                        <div class="card card-body">

                            @include('app.admin.roles.partials.edit-form')

                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="role-permissions-{{ $role->id }}">
                        @include('app.admin.roles.partials.permissions')
                    </div>
                </li>

            @empty

                <li class="list-group-item">
                    No roles added yet
                </li>

            @endforelse

        </ul>

    </div>

</div>

@include('app.admin.roles.partials.add-modal')

@endsection
