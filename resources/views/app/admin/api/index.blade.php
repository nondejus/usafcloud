@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card mb-5">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage OAuth Applications</span>
        <a href="{{ route('app.admin.api.create') }}" class="btn btn-primary">Create New App</a>
    </div>

    <div class="card-body">

        <div class="bg-white">

            @if($clients->count() > 0)

            <table class="table align-middle mb-0">
                <thead class="border border-solid border-2 bg-grey-lighter">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Homepage URL</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-solid border-2">

                    @foreach ($clients as $app)

                    <tr class="align-middle">
                        <th scope="row" class="align-middle text-center">
                            {{ $app->id }}
                        </th>
                        <td class="align-middle">
                            {{ $app->name }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ $app->homepage_url }}" target="_blank">{{ $app->homepage_url }}</a>
                        </td>
                        <td class="align-middle text-center">
                            <span class="badge badge-pill py-2 px-3
                        {{ ($app->revoked) ? 'badge-danger' : 'badge-success' }}">
                                {{ ($app->revoked) ? 'Revoked' : 'Active' }}
                            </span>
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('app.admin.api.show', $app) }}" class="btn btn-sm btn-link">View</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            @else
            <p class="text-muted m-0">There are no registered apps.</p>
            @endif

        </div>

    </div>

</div>

@endsection
