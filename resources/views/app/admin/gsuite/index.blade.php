@extends('app.admin.layout.base')

@section('admin-page-content')

<!-- Managed Accounts -->
<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage GSuite Accounts</span>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNewPermissionModal">
                Provision New GSuite Account
            </button>
        </div>
    </div>

    {{-- <div class="p-4 border-b border-grey-light border-solid">
        <input type="text" placeholder="Search permissions..." class="form-control">
    </div> --}}

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($accounts as $account)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <p class="text-xl m-0 text-grey-darker">{{ $account->gsuite_email }}</p>
                        <small class="text-muted">Owner: {{ $account->gsuiteable->name }}</small>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-1" type="button"
                            data-toggle="collapse" data-target="#account-meta-{{ $account->id }}" aria-expanded="false">
                            View Meta
                        </button>
                        <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                            data-target="#account-actions-{{ $account->id }}" aria-expanded="false">
                            Actions
                        </button>
                    </div>
                </div>
                <div class="collapse mt-3" id="account-meta-{{ $account->id }}">
                    <div class="card card-body">

                        <p>Ready: <span>{{ ($account->ready) ? 'Yes' : 'No' }}</span></p>
                        @if ($account->creating)
                        <p>Creating: <span>{{ ($account->creating) ? 'Yes' : 'No' }}</span></p>
                        @endif
                        <p class="mb-0">Suspended: {{ ($account->suspended) ? 'Yes' : 'No' }}</span></p>

                    </div>
                </div>
                <div class="collapse mt-3" id="account-actions-{{ $account->id }}">
                    <div class="card card-body">
                        <div>
                            <button class="btn btn-outline-danger">Delete</button>
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

<!-- Official Users -->
<div class="card my-4">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">GSuite API</span>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($users as $user)

            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <p class="text-xl m-0 text-grey-darker">{{ $user->primaryEmail }}</p>
                        <small class="text-muted">
                            Created: {{ \Carbon\Carbon::parse($user->creationTime)->diffForHumans() }}
                        </small>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-1" type="button"
                            data-toggle="collapse" data-target="#user-meta-{{ $user->id }}" aria-expanded="false">
                            View Meta
                        </button>
                        <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                            data-target="#user-actions-{{ $user->id }}" aria-expanded="false">
                            Actions
                        </button>
                    </div>
                </div>
                <div class="collapse mt-3" id="user-meta-{{ $user->id }}">
                    <div class="card card-body">

                    </div>
                </div>
                <div class="collapse mt-3" id="user-actions-{{ $user->id }}">
                    <div class="card card-body">
                        <div>
                            <button class="btn btn-outline-danger">Delete</button>
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
