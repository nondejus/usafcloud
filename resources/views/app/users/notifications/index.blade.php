@extends('app.users.layouts.layout')

@section('title')
Notifications
@endsection

@section('user-page-content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <!-- Notifications Menu -->
        <div class="col-md-3">

            <nav class="nav flex-column border border-solid rounded py-3">

                <h3 class="text-base text-gray-darker px-3 uppercase">My Notifications</h3>

                <a class="nav-link text-gray-dark hover:bg-gray-lighter hover:text-gray-darker" href="#">
                    Unread
                </a>
                <a class="nav-link text-gray-dark hover:bg-gray-lighter hover:text-gray-darker" href="#">
                    Snoozed
                </a>
            </nav>

        </div>

        <!-- Notifications Index -->
        <div class="col-md-8">

            @forelse ($user->notifications as $notification)

            <div class="border border-solid rounded alert alert-dismissible fade show p-0" role="alert">

                <!-- Notification Body -->
                <div class="p-4 bg-gray-lighter">
                    <h4 class="text-lg">
                        {{ $notification->title}}
                    </h4>

                    <p class="mb-3">
                        {{ $notification->content }}
                    </p>

                    @if ($notification->action_url)

                    <a href="{{ $notification->action_url }}" target="_blank" class="btn btn-sm btn-secondary m-0">
                        {{ ($notification->action_text) ? $notification->action_text : 'Check it out'}}
                    </a>

                    @endif

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Notification Footer -->
                <div class=" bg-gray-lighter flex px-4 py-3 justify-end border-top border-solid">

                    <a href="#" class="btn btn-sm btn-outline-secondary mr-2">Snooze</a>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Mark As Read</a>

                </div>

            </div>

            @empty
            <h2 class="text-base">Nothing to see...</h2>
            @endforelse

        </div>

    </div>



</div>
</div>

</div>

@endsection
