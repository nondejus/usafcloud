@extends('app.users.layouts.layout')

@section('title')
My Apps
@endsection

@section('user-page-content')

<div class="container my-5">

    <h2>My Apps</h2>

    @forelse ($user->apps as $app)
    <p>{{ $app->name }}</p>
    @empty
    <p>You have not authorized any third party apps</p>
    @endforelse

</div>

@endsection
