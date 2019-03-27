@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->middle_name }}</span>
    </div>

    <div class="card-body">

        <!-- Tab Nav -->
        @include('app.admin.users.partials.nav')

        <hr>

        <!-- Tab Content -->
        <div class="tab-content" id="pills-tabContent">

            <!-- General Tab -->
            @include('app.admin.users.tabs.general')

            <!-- GSuite Tab -->
            @include('app.admin.users.tabs.gsuite')

            <!-- Audit Tab -->
            @include('app.admin.users.tabs.audit')

            <!-- Organizations Tab -->
            @include('app.admin.users.tabs.organizations')

            <!-- Roles Tab -->
            @include('app.admin.users.tabs.roles')

            <!-- Permissions Tab -->
            @include('app.admin.users.tabs.permissions')

            <!-- Actions Tab -->
            @include('app.admin.users.tabs.actions')

        </div>

    </div>

</div>

@include('app.admin.users.partials.add-to-org')

@endsection
