@extends('app.layouts.base')

@section('page-content')

<section class="container-fluid tw-bg-gray-200 tw-border-gray-300 tw-border-solid tw-border">

    <div class="container">

        <div class="tw-flex tw-items-center tw-py-12">

            @if ($user->avatar)

                <img src="{{ Storage::url($user->avatar) }}" class="tw-w-24 tw-h-24 tw-rounded-full tw-mr-3" alt="{{ $user->name }}">

            @endif

            <div>

                <h2 class="tw-text-gray-900 tw-leading-none tw-mb-2">
                    {{ trim($user->last_name . ', ' . $user->first_name . ' ' . Str::limit($user->middle_name, 1, '')) }}
                </h2>

                <a href="mailto:{{ $user->email }}" class="tw-block">
                    {{ $user->email }}
                </a>

            </div>

        </div>

        <ul class="nav nav-tabs tw-border-none">

            <li class="nav-item">
                <a class="nav-link tw-text-gray-900 hover:tw-bg-gray-100 {{ applyActive('app.users.account.index') }}"
                    href="{{ route('app.users.account.index') }}">
                    Activity
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link tw-text-gray-900 hover:tw-bg-gray-100 {{ applyActive('app.users.account.apps.index') }}"
                    href="{{ route('app.users.account.apps.index') }}">
                    My Apps
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link tw-text-gray-900 hover:tw-bg-gray-100 {{ applyActive('app.users.account.teams.index') }}"
                    href="{{ route('app.users.account.teams.index') }}">
                    Teams
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link tw-text-gray-900 hover:tw-bg-gray-100 {{ applyActive('app.users.account.settings.index') }}"
                    href="{{ route('app.users.account.settings.index') }}">
                    Settings
                </a>
            </li>

        </ul>

    </div>

</section>

@yield('user-page-content')

@endsection
