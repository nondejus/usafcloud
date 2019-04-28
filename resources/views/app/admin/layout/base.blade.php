@extends('app.layouts.base')

@section('title')
Admin Dashboard
@endsection

@section('page-content')

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-3">

            <div class="card">
                <div class="card-header">
                    Admin Menu
                </div>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('app.admin.users.index') }}" class="list-group-item">
                        Manage Users
                    </a>
                    <a href="{{ route('app.admin.organizations.index') }}" class="list-group-item">
                        Manage Organizations
                    </a>
                </ul>
            </div>

            @hasrole('super-admin')
            <div class="card my-3">
                <div class="card-header">
                    Super Admin Menu
                </div>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('app.admin.acl.roles.index') }}" class="list-group-item">
                        Manage Roles
                    </a>
                    <a href="{{ route('app.admin.acl.permissions.index') }}" class="list-group-item">
                        Manage Permissions
                    </a>
                    <a href="{{ route('app.admin.gsuite.index') }}" class="list-group-item">
                        Manage GSuite Accounts
                    </a>
                    <a href="{{ route('app.admin.api.index') }}" class="list-group-item">
                        Manage API Apps
                    </a>
                </ul>
            </div>
            @endhasrole

        </div>

        <div class="col-md-9">

            @yield('admin-page-content')

        </div>

    </div>

</div>

@endsection
