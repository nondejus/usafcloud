@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card mb-5">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">Manage Your API Applications</span>
    </div>

    <div class="card-body">

        <passport-clients class="my-3"></passport-clients>
        <passport-authorized-clients class="my-3"></passport-authorized-clients>
        {{-- <passport-personal-access-tokens class="my-3"></passport-personal-access-tokens> --}}

    </div>

</div>

<div class="my-4 bg-white rounded">

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Homepage URL</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse (auth()->user()->apps as $app)

            <tr class="align-middle">
                <th scope="row" class="align-middle">
                    {{ $app->id }}
                </th>
                <td class="align-middle">
                    {{ $app->name }}
                </td>
                <td class="align-middle">
                    <a href="{{ $app->homepage_url }}" target="_blank">{{ $app->homepage_url }}</a>
                </td>
                <td class="align-middle">
                    <button class="btn btn-outline-primary btn-sm">Edit</button>
                </td>
            </tr>


            @empty
            @endforelse

        </tbody>
    </table>

</div>


<div class="card">

    <div class="card-header">
        Additional Details
    </div>

    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Short Description</label>
                <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Homepage URL</label>
                <input type="url" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Avatar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                    <label class="custom-file-label" for="avatar">Choose file</label>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>

</div>

@endsection
