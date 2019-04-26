@extends('app.users.layouts.layout')

@section('title')
My Apps
@endsection

@section('user-page-content')

<div class="container my-5">

    @forelse ($user->apps as $app)
    <p>{{ $app->name }}</p>
    @empty

    <div class="flex items-center flex-column">

        <p class="text-muted text-2xl mb-5 leading-none">
            You have not authorized any third party apps.
        </p>

        @svg('connect', 'w-1/3 h-auto')

    </div>

    @endforelse

</div>

@endsection
