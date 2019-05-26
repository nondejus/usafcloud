@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card tw-mb-8">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Manage OAuth Applications</span>
        <a href="{{ route('app.admin.api.create') }}" class="btn btn-primary">Create New App</a>
    </div>

    <div class="card-body">

        <div class="tw-bg-white">

            @if($clients->count() > 0)

                <table class="table align-middle tw-mb-0">

                    <thead class="tw-border tw-border-solid tw-border-2 tw-bg-gray-300">
                        <tr>
                            <th scope="col" class="tw-text-center">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Homepage URL</th>
                            <th scope="col" class="tw-text-center">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tw-border tw-border-solid tw-border-2">

                        @foreach ($clients as $app)

                            <tr class="align-middle">
                                <th scope="row" class="align-middle tw-text-center">
                                    {{ $app->id }}
                                </th>
                                <td class="align-middle">
                                    {{ $app->name }}
                                </td>
                                <td class="align-middle">
                                    <a href="{{ $app->homepage_url }}" target="_blank">{{ $app->homepage_url }}</a>
                                </td>
                                <td class="align-middle tw-text-center">
                                    <span class="badge badge-pill tw-py-2 tw-px-3
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
            
                <p class="text-muted tw-m-0">There are no registered apps.</p>

            @endif

        </div>

    </div>

</div>

@endsection
