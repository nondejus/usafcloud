@extends('app.layouts.base')

@section('title', 'App Authorization')

@section('page-content')

<div class="container tw-my-12">

    <div class="row tw-justify-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body tw-p-5">

                    <h2 class="text-muted tw-text-xl tw-mb-4">Hello {{ auth()->user()->name }},</h2>

                    <div class="tw-flex">

                        @if($client->avatar)
                        <div class="tw-w-1/4 tw-pr-3 tw-flex tw-justify-center tw-items-center">
                            <img class="tw-h-32" src="{{ Storage::url($client->avatar) }}" alt="{{ $client->name }}">
                        </div>
                        @endif

                        <div class="tw-flex-1 tw-flex tw-content-center">

                            <div>
                                <p class="tw-mb-2 tw-font-semibold">
                                    <a href="{{ $client->homepage_url }}" target="_blank">{{ $client->name }}</a> is
                                    requesting permission to access your
                                    account.
                                </p>

                                <p class="tw-mb-2 tw-text-muted">
                                    <span class="tw-font-semibold">Description</span>: {{ $client->description }}
                                </p>

                                <!-- Scope List -->
                                @if (count($scopes) > 0)
                                <div class="scopes">
                                    <p class="tw-mb-0"><strong>This application will be able to:</strong></p>

                                    <ul class="tw-mb-0">
                                        @foreach ($scopes as $scope)
                                        <li>{{ $scope->description }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer tw-flex tw-justify-end">

                    <!-- Cancel Button -->
                    <form method="post" action="{{ route('passport.authorizations.deny') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <input type="hidden" name="state" value="{{ $request->state }}">
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <button class="btn btn-danger tw-mr-2">Cancel</button>
                    </form>

                    <!-- Authorize Button -->
                    <form method="post" action="{{ route('passport.authorizations.approve') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="state" value="{{ $request->state }}">
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <button type="submit" class="btn btn-success btn-approve">Authorize</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection
