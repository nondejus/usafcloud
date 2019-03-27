@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">{{ $organization->name }}</span>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserToOrganization">
                Add Member to Organization
            </button>
        </div>
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
