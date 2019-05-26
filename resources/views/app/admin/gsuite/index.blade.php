@extends('app.admin.layout.base')

@section('admin-page-content')

<!-- Managed Accounts -->
<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Manage GSuite Accounts</span>
        
        <button type="button" class="btn btn-primary tw-block" data-toggle="modal" data-target="#createNewPermissionModal">
            Provision New GSuite Account
        </button>        
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($accounts as $account)

                <li class="list-group-item">
                    <div class="tw-flex tw-justify-between tw-items-center">
                        <div>
                            <p class="tw-text-xl tw-m-0 tw-text-gray-800">{{ $account->gsuite_email }}</p>
                            <small class="text-muted">Owner: {{ $account->gsuiteable->name }}</small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#account-meta-{{ $account->id }}" aria-expanded="false">
                                View Meta
                            </button>
                            <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                                data-target="#account-actions-{{ $account->id }}" aria-expanded="false">
                                Actions
                            </button>
                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="account-meta-{{ $account->id }}">
                        <div class="card card-body">

                            <p>Ready: <span>{{ ($account->ready) ? 'Yes' : 'No' }}</span></p>
                            @if ($account->creating)
                            <p>Creating: <span>{{ ($account->creating) ? 'Yes' : 'No' }}</span></p>
                            @endif
                            <p class="tw-mb-0">Suspended: {{ ($account->suspended) ? 'Yes' : 'No' }}</span></p>

                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="account-actions-{{ $account->id }}">
                        <div class="card card-body">
                            <div>
                                <button class="btn btn-outline-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </li>

            @empty

                <li class="list-group-item">
                    
                    <h3 class="tw-text-grey-500 tw-text-lg tw-m-0">No managed accounts yet.</h3>
                    
                </li>

            @endforelse

        </ul>

    </div>

</div>

<!-- Official Users -->
<div class="card tw-my-4">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">GSuite API</span>
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($users as $user)

                <li class="list-group-item">
                    <div class="tw-flex tw-justify-between tw-items-center">
                        <div>
                            <p class="tw-text-xl tw-m-0 tw-text-gray-800">{{ $user->primaryEmail }}</p>
                            <small class="text-muted">
                                Created: {{ \Carbon\Carbon::parse($user->creationTime)->diffForHumans() }}
                            </small>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#user-meta-{{ $user->id }}" aria-expanded="false">
                                View Meta
                            </button>
                            <button class="btn btn-sm btn-outline-primary btn-rounded" type="button" data-toggle="collapse"
                                data-target="#user-actions-{{ $user->id }}" aria-expanded="false">
                                Actions
                            </button>
                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="user-meta-{{ $user->id }}">
                        <div class="card card-body">

                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="user-actions-{{ $user->id }}">
                        <div class="card card-body">
                            <div>
                                <button class="btn btn-outline-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </li>

            @empty

                <li class="list-group-item">
                    There are no GSuite accounts.
                </li>

            @endforelse

        </ul>

    </div>

</div>

@endsection
