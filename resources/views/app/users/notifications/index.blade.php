@extends('app.users.layouts.layout')

@section('title', 'Notifications')

@section('user-page-content')

<div class="container tw-mt-5">

    <div class="row tw-content-center">

        <!-- Notifications Menu -->
        <div class="col-md-3">

            <nav class="nav tw-flex-col tw-border tw-border-solid tw-rounded tw-py-3">

                <h3 class="tw-text-base tw-text-gray-800 tw-px-3 tw-uppercase">My Notifications</h3>

                <a class="nav-link tw-text-gray-700 hover:tw-bg-gray-200 hover:tw-text-gray-800" href="#">
                    Unread
                </a>

                <a class="nav-link tw-text-gray-700 hover:tw-bg-gray-200 hover:tw-text-gray-800" href="#">
                    Snoozed
                </a>
            </nav>

        </div>

        <!-- Notifications Index -->
        <div class="col-md-8">

            @forelse ($user->notifications as $notification)

                <div class="tw-border tw-border-solid tw-border-gray-400 tw-rounded alert alert-dismissible fade show tw-p-0" role="alert">

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

                <h2 class="tw-text-base">Nothing to see...</h2>

            @endforelse

        </div>

    </div>



</div>
</div>

</div>

@endsection
