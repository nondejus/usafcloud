@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-xl">Manage Users ({{ $users->count() }})</span>

        <a class="btn btn-primary btn-rounded tw-block" href="{{ route('app.admin.users.create') }}">
            Create New User
        </a>
    </div>

    <div class="tw-p-6 tw-border-b tw-border-gray-300 tw-border-solid">
        <input type="text" id="filterUsersInput" placeholder="Search users..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush" id="usersList">

            @foreach ($users as $user)

                <li class="list-group-item">

                    <div class="tw-flex tw-justify-between tw-items-center">

                        <p class="tw-text-lg tw-m-0 tw-text-gray-800 tw-block">
                            {{ $user->last_name }}, {{ $user->first_name }} {{ Str::limit($user->middle_name, 1, '') }}
                            <a href="mailto:{{ $user->email }}" class="tw-block tw-text-xs">{{ $user->email }}</a>
                        </p>

                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#user-view-{{ $user->id }}" aria-expanded="false">
                                Quick View
                            </button>
                            <a href="{{ route('app.admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary">
                                Manage User
                            </a>
                        </div>

                    </div>

                    <!-- Quick View -->
                    <div class="collapse tw-mt-3" id="user-view-{{ $user->id }}">

                        <div class="card">
                            <div class="card-body">
                                <p>Name: <span class="tw-underline">{{ $user->first_name }}</span></p>
                                <p>Last Name: <span class="tw-underline">{{ $user->last_name }}</span></p>
                                <p>Middle Name: <span class="tw-underline tw-mb-0">{{ $user->middle_name }}</span></p>
                            </div>
                        </div>

                    </div>

                </li>

            @endforeach

        </ul>

    </div>

</div>
@endsection
