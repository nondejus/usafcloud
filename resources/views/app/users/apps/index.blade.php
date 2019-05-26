@extends('app.users.layouts.layout')

@section('title', 'My Apps')

@section('user-page-content')

<div class="container tw-my-8">

    @if($user->apps)

        <div class="tw-px-2">

            <div class="tw-flex tw-flex-wrap tw--mx-2">

                @foreach($user->apps as $app)

                    <div class="tw-w-1/3 tw-px-2 tw-border tw-border-solid tw-rounded tw-mx-1 tw-mb-2 hover:tw-bg-gray-lighter tw-flex-1">

                        <div class="tw-flex tw-flex-wrap tw-p-4">

                            @if ($app->client->avatar)
                                <img class="tw-h-24 tw-mx-auto tw-block md:tw-mr-4 md:tw-inline-block" src="{{ Storage::url($app->client->avatar) }}" alt="{{ $app->client->name }}">
                            @endif

                            <div class="md:tw-flex-1">
                                <a href="{{ $app->client->homepage_url }}" target="_blank">
                                    {{ $app->client->name }}
                                </a>
                                <p class="tw-mb-0">
                                    {{ $app->client->description }}
                                </p>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @else

        <div class="tw-flex tw-items-center tw-flex-column">

            <p class="tw-text-grey-300 tw-text-2xl tw-mb-5 tw-leading-none">
                You have not authorized any third party apps.
            </p>

            @svg('connect', 'tw-w-1/3 tw-h-auto tw-inline-block')

        </div>

    @endif

</div>

@endsection
