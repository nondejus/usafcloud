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
                    2d Lt {{ auth()->user()->last_name . ', ' . auth()->user()->first_name }}
                </h2>
                <p class="text-grey-dark m-0">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>

        <ul class="nav nav-tabs border-bottom-0">
            <li class="nav-item">
                <a class="nav-link active" href="#">Activity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest" href="#">My Apps</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-grey-darkest hover:bg-grey-lightest" href="#">Settings</a>
            </li>
        </ul>

    </div>

</section>

@yield('user-page-content')

@endsection
