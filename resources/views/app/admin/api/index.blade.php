@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card mb-5">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">Manage Your API Applications</span>
    </div>

    <div class="card-body">

        <passport-clients class="my-3"></passport-clients>
        <passport-authorized-clients class="my-3"></passport-authorized-clients>

        <div class="my-4 bg-white">

            <table class="table align-middle">
                <thead class="border border-solid border-2">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Homepage URL</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-solid border-2">

                    @forelse (auth()->user()->apps as $app)

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
                            <span class="badge badge-pill p-2 border border-solid
                        {{ ($app->active) ? 'badge-success border-green' : 'badge-warning border-yellow' }}">
                                {{ ($app->active) ? 'Active' : 'Not Active' }}
                            </span>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-link">Edit</button>
                        </td>
                    </tr>


                    @empty
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

</div>

@endsection
