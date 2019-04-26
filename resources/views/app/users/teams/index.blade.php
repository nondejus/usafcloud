@extends('app.users.layouts.layout')

@section('title')
My Teams
@endsection

@section('user-page-content')

<div class="container my-5">

    <h3 class="text-2xl text-grey-darkest mb-4">My Teams</h3>

    @forelse ($user->organizations as $organization)

    <div>

        <h3>{{ $organization->name }}</h3>

    </div>


    @empty

    <p class="text-muted">You are not currently in any teams/organizations.</p>

    @endforelse

</div>

@endsection
