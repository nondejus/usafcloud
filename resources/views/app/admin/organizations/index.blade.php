@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Manage Organizations</span>
        
        <button type="button" class="btn btn-primary tw-block" data-toggle="modal" data-target="#createNewOrganizationModal">
            Create Organzation
        </button>
    </div>

    <div class="tw-p-4 tw-border-b tw-border-gray-300 tw-border-solid">
        <input type="text" id="filterOrganizationsInput" placeholder="Search organizations..." class="form-control">
    </div>

    <div class="card-body">

        <ul class="list-group list-group-flush" id="organizationsList">

            @forelse ($organizations as $organization)

                <li class="list-group-item">
                    <div class="tw-flex tw-justify-between tw-items-center">
                        <p class="tw-text-xl tw-m-0 tw-text-gray-800">{{ $organization->name }}</p>
                        <div>
                            <button class="btn btn-sm btn-outline-primary btn-rounded tw-mr-1" type="button"
                                data-toggle="collapse" data-target="#organization-view-{{ $organization->id }}"
                                aria-expanded="false">
                                Quick View
                            </button>
                            <a href="{{ route('app.admin.organizations.show', $organization) }}"
                                class="btn btn-sm btn-outline-primary">
                                Manage Organization
                            </a>
                        </div>
                    </div>
                    <div class="collapse tw-mt-3" id="organization-view-{{ $organization->id }}">
                        <div class="card card-body">
                            <p>ID: <span class="tw-underline">{{ $organization->id }}</span></p>
                            <p class="tw-m-0">Number of Members: <span
                                    class="tw-underline">{{ $organization->members->count() }}</span></p>
                        </div>
                    </div>

                </li>

            @empty

                <li class="list-group-item">
                    <p class="tw-text-xl tw-m-0 tw-text-gray-800">Currently no organizations</p>
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
                        <input type="text" class="form-control" placeholder="12th Training Squadron" name="name"
                            value="{{ old('name') }}" required autocomplete="false">
                        
                        @error('name')
                            @include('components.error')
                        @enderror

                    </div>                    

                    <div class="form-group">
                        <label for="email">Organization Name</label>
                        <input type="email" class="form-control" placeholder="12trs@us.af.mil" name="email"
                            value="{{ old('email') }}" required autocomplete="false">
                        
                        @error('email')
                            @include('components.error')
                        @enderror

                    </div>                    

                    <div class="form-check">
                        <label class="form-check-label" for="needs_gsuite">
                            <input class="form-check-input" type="checkbox" id="needs_gsuite" name="needs_gsuite"
                                value="yes">
                            <label class="form-check-label" for="needs_gsuite">
                                Provision GSuite Account?
                            </label>
                            <small class="form-text text-muted">
                                Optional, should we create a GSuite Account for this organization. They will be emailed
                                a temporary password for thier new account and will be required to set a password the
                                first time they log in.
                            </small>
                    </div>

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
