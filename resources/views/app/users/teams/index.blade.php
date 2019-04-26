@extends('app.users.layouts.layout')

@section('title')
My Teams
@endsection

@section('user-page-content')

<div class="container my-5">

    <h3 class="text-2xl text-grey-darkest mb-4">My Teams</h3>

    @forelse ($user->organizations as $organization)

    {{ $organization->name }}

    @empty
    <p>Nope</p>
    @endforelse

</div>

@endsection
