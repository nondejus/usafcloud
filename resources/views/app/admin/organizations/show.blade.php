@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">{{ $organization->name }}</span>
        
        <button type="button" class="btn btn-primary tw-block" data-toggle="modal" data-target="#addUserToOrganization">
            Add Member to Organization
        </button>        
    </div>

    <div class="card-body">

        <div class="no-margin-last-paragraph">
            @forelse ($organization->members as $member)
                <p class="text-base">{{ $member->name }}</p>
            @empty
                This organization doesn't have any members yet.
            @endforelse
        </div>

    </div>

    @include('app.admin.organizations.partials.delete-org')

</div>

@include('app.admin.organizations.partials.add-user')

@endsection
