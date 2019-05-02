@extends('app.layouts.base')

@section('title')
App Authorization
@endsection

@section('page-content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body p-5">

                    <h2 class="text-muted text-xl mb-4">Hello {{ auth()->user()->name }},</h2>

                    <div class="flex">

                        @if($client->avatar)
                        <div class="w-1/4 pr-3 flex justify-center items-center">
                            <img class="h-32" src="{{ Storage::url($client->avatar) }}" alt="{{ $client->name }}">
                        </div>
                        @endif

                        <div class="flex-1 flex content-center">

                            <div>
                                <p class="mb-2 font-semibold">
                                    <a href="{{ $client->homepage_url }}" target="_blank">{{ $client->name }}</a> is
                                    requesting permission to access your
                                    account.
                                </p>

                                <p class="mb-2 text-muted">
                                    <span class="font-semibold">Description</span>: {{ $client->description }}
                                </p>

                                <!-- Scope List -->
                                @if (count($scopes) > 0)
                                <div class="scopes">
                                    <p class="mb-0"><strong>This application will be able to:</strong></p>

                                    <ul class="mb-0">
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

                <div class="card-footer flex justify-end">

                    <!-- Cancel Button -->
                    <form method="post" action="{{ route('passport.authorizations.deny') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <input type="hidden" name="state" value="{{ $request->state }}">
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <button class="btn btn-danger mr-2">Cancel</button>
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
