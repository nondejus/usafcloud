@extends('app.users.layouts.layout')

@section('title')
My Apps
@endsection

@section('user-page-content')

<div class="container my-5">

    @forelse ($user->apps as $app)

    <div class="flex p-4 border border-solid rounded">
        @if ($app->client->avatar)
        <img class="w-24 mr-3" src="{{ Storage::url($app->client->avatar) }}" alt="{{ $app->client->name }}">
        @endif
        <div>
            <a href="{{ $app->client->homepage_url }}" target="_blank">{{ $app->client->name }}</a>
            <p class="mb-0">{{ $app->client->description }}</p>
        </div>
    </div>

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
