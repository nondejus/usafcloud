@extends('app.layouts.base')

@section('page-content')

<section class="container-fluid bg-grey-lighter border-bottom border-solid border-grey">

    <div class="container">

        <div class="flex align-items-center py-5">
            @if ($user->avatar)
            <img src="{{ Storage::url($user->avatar) }}" class="w-24 h-24 rounded-full mr-3" alt="{{ $user->name }}">
            @endif
            <div>
                <h2 class="text-grey-darkest leading-none mb-2">
                    {{ trim($user->last_name . ', ' . $user->first_name . ' ' . Str::limit($user->middle_name, 1, '')) }}
                </h2>
                <p class="text-grey-dark m-0">
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </p>
            </div>
        </div>

        <ul class="nav nav-tabs border-bottom-0">
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest {{ applyActive('app.users.account.index') }}"
                    href="{{ route('app.users.account.index') }}">
                    Activity
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest {{ applyActive('app.users.account.apps.index') }}"
                    href="{{ route('app.users.account.apps.index') }}">
                    My Apps
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest" href="#">
                    Teams
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest {{ applyActive('app.users.account.settings.index') }}"
                    href="{{ route('app.users.account.settings.index') }}">
                    Settings
                </a>
            </li>
        </ul>

    </div>

</section>

@yield('user-page-content')

@endsection
