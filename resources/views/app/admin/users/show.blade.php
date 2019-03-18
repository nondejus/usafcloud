@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">{{ $user->name }}</span>
    </div>

    <div class="card-body">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab"
                    aria-controls="pills-general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab"
                    aria-controls="pills-services" aria-selected="false">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-audit-tab" data-toggle="pill" href="#pills-audit" role="tab"
                    aria-controls="pills-audit" aria-selected="false">Audit Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-organizations-tab" data-toggle="pill" href="#pills-organizations" role="tab"
                    aria-controls="pills-organizations" aria-selected="false">Organizations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-roles-tab" data-toggle="pill" href="#pills-roles" role="tab"
                    aria-controls="pills-roles" aria-selected="false">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-permissions-tab" data-toggle="pill" href="#pills-permissions" role="tab"
                    aria-controls="pills-permissions" aria-selected="false">Permissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-actions-tab" data-toggle="pill" href="#pills-actions" role="tab"
                    aria-controls="pills-actions" aria-selected="false">Actions</a>
            </li>
        </ul>
        <hr>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
                <p>First Name: <span class="underline">{{ $user->first_name }}</span></p>
                <p>Last Name: <span class="underline">{{ $user->last_name }}</span></p>
                <p>Nickname: <span class="underline">{{ $user->nickname }}</span></p>
                <p>Email Address:
                    <span class="underline">
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </span>
                </p>
            </div>

            <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-profile-tab">
                <p class="mb-0">G-Suite Enabled: <span class="underline">No</span></p>
            </div>

            <div class="tab-pane fade" id="pills-audit" role="tabpanel" aria-labelledby="pills-contact-tab">
                Audit Log Here
            </div>

            <div class="tab-pane fade" id="pills-organizations" role="tabpanel" aria-labelledby="pills-organizations-tab">
                Display organizations
            </div>


            <div class="tab-pane fade" id="pills-roles" role="tabpanel" aria-labelledby="pills-contact-tab">
                <p class="m-0">
                    Roles:
                    @forelse ($user->roles as $role)
                    <span class="badge badge-secondary">{{ $role->name }}</span>
                    @empty
                    @endforelse
                </p>
            </div>

            <div class="tab-pane fade" id="pills-permissions" role="tabpanel" aria-labelledby="pills-permissions-tab">
                <p class="m-0">
                    Stand Alone Permissions:
                    @forelse ($user->permissions as $permission)
                    <span class="badge badge-secondary">{{ $permission->name }}</span>
                    @empty
                    @endforelse
                </p>
            </div>

            <div class="tab-pane fade" id="pills-actions" role="tabpanel" aria-labelledby="pills-actions-tab">
                @can('users:destroy')

                <form action="{{ route('app.admin.users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete User</button>
                </form>

                @endcan
            </div>


        </div>


    </div>



</div>

@endsection
