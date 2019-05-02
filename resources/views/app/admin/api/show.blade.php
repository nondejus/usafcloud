@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card mb-5">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">Manage API Application</span>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $client->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{ $client->description }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Homepage Url</th>
                        <td><a href="{{ $client->homepage_url }}" target="_blank">{{ $client->homepage_url }}</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Redirect Url</th>
                        <td>{{ $client->redirect }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Secret</th>
                        <td class="{{ ($client->revoked) ? 'text-red-light' : 'text-green-light' }}">
                            {{ $client->secret }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            <span
                                class="badge badge-pill px-3 py-2 {{ ($client->revoked) ? 'badge-danger' : 'badge-success' }}">
                                {{ ($client->revoked) ? 'Revoked' : 'Active' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Approved Until</th>
                        <td>{{ $client->approved_until }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
