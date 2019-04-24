@extends('app.layouts.base')

@section('page-content')

<section class="container-fluid bg-grey-lighter border-bottom border-solid border-grey">

    <div class="container">

        <div class="flex align-items-center py-5">
            @if (auth()->user()->avatar)
            <img src="{{ Storage::url(auth()->user()->avatar) }}" class="w-24 h-24 rounded-full mr-3"
                alt="{{ auth()->user()->name }}">
            @endif
            <div>
                <h2 class="text-grey-darkest leading-none mb-2">
                    {{ trim(auth()->user()->last_name . ', ' . auth()->user()->first_name . ' ' . Str::limit(auth()->user()->middle_name, 1, '')) }}
                </h2>
                <p class="text-grey-dark m-0">
                    <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
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
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest" href="#">
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
