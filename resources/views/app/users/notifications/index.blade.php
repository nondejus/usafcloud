@extends('app.users.layouts.layout')

@section('title')
Notifications
@endsection

@section('user-page-content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            @forelse ($user->notifications as $notification)

            <div class="alert alert-primary alert-dismissible fade show" role="alert">

                <p class="mb-1"><strong>{{ $notification->title }}</strong></p>
                <p class="mb-0">
                    {{ $notification->content }}
                </p>
                @if ($notification->action_url)
                <a href="{{ $notification->action_url }}" target="_blank" class="btn btn-link">
                    {{ ($notification->action_text) ? $notification->action_text : 'Check it out'}}
                </a>
                @endif

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            @empty
            <h2 class="text-base">Nothing to see...</h2>
            @endforelse

        </div>
    </div>

</div>

@endsection
