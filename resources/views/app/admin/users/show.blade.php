@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">{{ $user->name }}</span>
        <div>
            <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#createNewPermissionModal">
                Some Action
            </button>
        </div>
    </div>

    <div class="card-body">

        <p>First Name: <span class="underline">{{ $user->first_name }}</span></p>
        <p>Last Name: <span class="underline">{{ $user->last_name }}</span></p>
        <p>Nickname: <span class="underline">{{ $user->nickname }}</span></p>
        <p>Organization: <span class="underline">Active Duty USAF</span></p>
        <p>Email Address:
            <span class="underline">
                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </span>
        </p>
        <p>G-Suite Enabled: <span class="underline">No</span></p>

        <p>
            Roles:
            @forelse ($user->roles as $role)
            <span class="badge badge-secondary">{{ $role->name }}</span>
            @empty
            @endforelse
        </p>

        <p class="m-0">
            Stand Alone Permissions:
            @forelse ($user->permissions as $permission)
            <span class="badge badge-secondary">{{ $permission->name }}</span>
            @empty
            @endforelse
        </p>

    </div>

    @can('users:destroy')
    <div class="card-footer">
        <form action="{{ route('app.admin.users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete User</button>
        </form>
    </div>
    @endcan

</div>

@endsection
