@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->middle_name }}</span>
    </div>

    <div class="card-body">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            <!-- General Tab Btn -->
            <li class="nav-item">
                <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab"
                    aria-controls="pills-general" aria-selected="true">General</a>
            </li>

            <!-- Services Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab"
                    aria-controls="pills-services" aria-selected="false">Services</a>
            </li>

            <!-- Audit Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-audit-tab" data-toggle="pill" href="#pills-audit" role="tab"
                    aria-controls="pills-audit" aria-selected="false">Audit Log</a>
            </li>

            <!-- Organizations Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-organizations-tab" data-toggle="pill" href="#pills-organizations"
                    role="tab" aria-controls="pills-organizations" aria-selected="false">Organizations</a>
            </li>

            <!-- Roles Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-roles-tab" data-toggle="pill" href="#pills-roles" role="tab"
                    aria-controls="pills-roles" aria-selected="false">Roles</a>
            </li>

            <!-- Permissions Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-permissions-tab" data-toggle="pill" href="#pills-permissions" role="tab"
                    aria-controls="pills-permissions" aria-selected="false">Permissions</a>
            </li>

            <!-- Actions Tab Btn -->
            <li class="nav-item">
                <a class="nav-link" id="pills-actions-tab" data-toggle="pill" href="#pills-actions" role="tab"
                    aria-controls="pills-actions" aria-selected="false">Actions</a>
            </li>
        </ul>

        <hr>

        <!-- Tab Content -->
        <div class="tab-content" id="pills-tabContent">

            <!-- General Tab -->
            <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
                <p>First Name: <span class="underline">{{ $user->first_name }}</span></p>
                <p>Last Name: <span class="underline">{{ $user->last_name }}</span></p>
                <p>Middle Name: <span class="underline">{{ $user->middle_name }}</span></p>
                <p>Nickname: <span class="underline">{{ $user->nickname }}</span></p>
                <p>Email Address:
                    <span class="underline">
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </span>
                </p>
            </div>

            <!-- Services Tab -->
            <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-profile-tab">
                <p class="mb-0">
                    <p>G-Suite Enabled: <span class="underline">{{ ($user->gsuite_user) ? 'Yes' : 'No' }}</span></p>
                    @if($user->gsuite_user)

                    <p>G-Suite Email: <span class="underline">{{ $user->gsuite_email }}</span></p>
                    <p>G-Suite Account Created At: <span class="underline">{{ $user->gsuite_created_at }}</span></p>
                    <p>G-Suite Account Finished Provisioning: <span
                            class="underline">{{ ($user->gsuite_finished_provisioning) ? 'Yes' : 'No' }}</span></p>

                    @endif
                </p>
            </div>

            <!-- Audit Tab -->
            <div class="tab-pane fade" id="pills-audit" role="tabpanel" aria-labelledby="pills-contact-tab">
                Audit Log Here
            </div>

            <!-- Organizations Tab -->
            <div class="tab-pane fade" id="pills-organizations" role="tabpanel"
                aria-labelledby="pills-organizations-tab">

                @forelse ($user->organizations as $organization)
                <p class="text-xl m-0 text-grey-darker">{{ $organization->name }}</p>
                @empty
                @endforelse

                <hr>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUserToOrganization">Add
                    to
                    Organization</button>

            </div>

            <!-- Roles Tab -->
            <div class="tab-pane fade" id="pills-roles" role="tabpanel" aria-labelledby="pills-contact-tab">
                <p class="m-0">
                    Roles:
                    @forelse ($user->roles as $role)
                    <span class="badge badge-secondary">{{ $role->name }}</span>
                    @empty
                    @endforelse
                </p>
            </div>

            <!-- Permissions Tab -->
            <div class="tab-pane fade" id="pills-permissions" role="tabpanel" aria-labelledby="pills-permissions-tab">
                <p class="m-0">
                    Stand Alone Permissions:
                    @forelse ($user->permissions as $permission)
                    <span class="badge badge-secondary">{{ $permission->name }}</span>
                    @empty
                    @endforelse
                </p>
            </div>

            <!-- Actions Tab -->
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
        <!-- /Tab Content -->

    </div>
    <!-- Card Body -->

</div>
<!-- /Card -->

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

            <form action="{{ route('app.admin.users.organizations.store', $user) }}" method="POST">

                <div class="modal-body">

                    @csrf

                    <div class="form-group">
                        <label for="">Choose an organization</label>
                        <select class="form-control" name="organization_id">
                            @forelse ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
