@extends('app.users.layouts.layout')

@section('title', 'My Apps')

@section('user-page-content')

<div class="container my-5">

    @if($user->apps)

        <div class="px-2">

            <div class="flex flex-wrap -mx-2">

                @foreach($user->apps as $app)

                    <div class="w-1/3 px-2 border border-solid rounded mx-1 mb-2 hover:bg-grey-lighter flex-1">

                        <div class="flex flex-wrap p-4">

                            @if ($app->client->avatar)
                                <img class="h-24 mx-auto sm:mx-auto md:mr-2" src="{{ Storage::url($app->client->avatar) }}" alt="{{ $app->client->name }}">
                            @endif

                            <div class="flex-1">
                                <a href="{{ $app->client->homepage_url }}" target="_blank">{{ $app->client->name }}</a>
                                <p class="mb-0">{{ $app->client->description }}</p>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @else

        <div class="flex items-center flex-column">

            <p class="text-muted text-2xl mb-5 leading-none">
                You have not authorized any third party apps.
            </p>

            @svg('connect', 'w-1/3 h-auto')

        </div>

    @endif

</div>

@endsection
