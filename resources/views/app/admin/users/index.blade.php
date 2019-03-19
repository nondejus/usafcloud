@extends('app.admin.layout.base')
@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Users ({{ $users->count() }})</span>
        <div>
            <a class="btn btn-primary btn-rounded" href="{{ route('app.admin.users.create') }}">
                Create New User
            </a>
        </div>
    </div>

    <div class="p-4 border-b border-grey-light border-solid">
        <input type="text" id="filterUsersInput" placeholder="Search users..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush" id="usersList">

            @forelse ($users as $user)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <p class="text-xl m-0 text-grey-darker">
                            {{ $user->last_name }}, {{ $user->first_name }} {{ Str::limit($user->middle_name, 1, '') }}
                        </p>
                    </div>

                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-1" type="button" data-toggle="collapse"
                            data-target="#user-view-{{ $user->id }}" aria-expanded="false">
                            Quick View
                        </button>
                        <a href="{{ route('app.admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary">
                            Manage User
                        </a>
                    </div>
                </div>
                <div class="collapse mt-3" id="user-view-{{ $user->id }}">
                    <div class="card">
                        <div class="card-body">
                            <p>Name: <span class="underline">{{ $user->first_name }}</span></p>
                            <p>Last Name: <span class="underline">{{ $user->last_name }}</span></p>
                            <p>Middle Name: <span class="underline">{{ $user->middle_name }}</span></p>
                            <p class="mb-0">Email Address:
                                <span class="underline">
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </span>
                            </p>
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
