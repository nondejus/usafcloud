@extends('app.users.layouts.layout')

@section('title', 'My Teams')

@section('user-page-content')

<div class="container tw-my-10">

    <h3 class="tw-text-2xl tw-text-gray-900 tw-mb-6">My Teams</h3>

    @forelse ($user->organizations as $organization)

        <div>

            <h3>{{ $organization->name }}</h3>

        </div>

    @empty

        <p class="tw-text-gray-500">You are not currently in any teams/organizations.</p>

    @endforelse

</div>

@endsection
