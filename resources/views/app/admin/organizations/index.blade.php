@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Organizations</span>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNewOrganizationModal">
                Create Organzation
            </button>
        </div>
    </div>

    <div class="p-4 border-b border-grey-light border-solid">
        <input type="text" placeholder="Search organizations..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush">

            @forelse ($organizations as $organization)
            <li class="list-group-item">
                <div class="flex justify-content-between align-items-center">
                    <p class="text-xl m-0 text-grey-darker">{{ $organization->name }}</p>
                    <div>
                        <button class="btn btn-sm btn-outline-primary btn-rounded mr-1" type="button" data-toggle="collapse"
                            data-target="#organization-view-{{ $organization->id }}" aria-expanded="false">
                            Quick View
                        </button>
                        <a href="{{ route('app.admin.organizations.show', $organization) }}" class="btn btn-sm btn-outline-primary">
                            Manage Organization
                        </a>
                    </div>
                </div>
                <div class="collapse mt-3" id="organization-view-{{ $organization->id }}">
                    <div class="card card-body">
                        <p>ID: <span class="underline">{{ $organization->id }}</span></p>
                        <p class="m-0">Number of Members: <span class="underline">{{ $organization->members->count() }}</span></p>
                    </div>
                </div>

            </li>
            @empty
            <li class="list-group-item">
                <p class="text-xl m-0 text-grey-darker">Currently no organizations</p>
            </li>
            @endforelse

        </ul>


    </div>

</div>

<!-- Create New Organization Modal -->
<div class="modal fade" id="createNewOrganizationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('app.admin.organizations.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Organization Name</label>
                        <input type="text" class="form-control" placeholder="12th Training Squadron" name="name" value="{{ old('name') }}"
                            required autocomplete="false">
                    </div>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
