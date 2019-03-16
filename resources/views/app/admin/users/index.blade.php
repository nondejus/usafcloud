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

    <div class="card-body">

        ...

    </div>

</div>

@endsection
