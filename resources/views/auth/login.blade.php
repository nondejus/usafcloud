@extends('auth.layouts.app')

@section('page-title', 'Login')

@section('content')

<div class="tw-w-3/4 sm:tw-w-3/5 md:tw-w-1/3 lg:tw-w-2/5 xl:tw-w-1/5">

    <h1 class="tw-text-center tw-text-gray-600 tw-my-6 tw-px-1">
        USAF.Cloud
    </h1>

    <div class="card card-body tw-p-10">

        <h2 class="tw-text-center tw-mb-6 tw-text-3xl">Sign In</h2>

        <form action="{{ route('login') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="">Email Address</label>
                <input type="email" name="email" id="email"
                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                    required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror

            </div>

            <div class="form-group">

                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-mt-6">

                <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>

                @if(config('app.open_registation'))

                    <a class="tw-block tw-mt-6" href="{{ route('register') }}">Create Account</a>

                @endif

            </div>

        </form>
    </div>

    <p class="tw-text-center tw-text-gray-500 tw-mt-5 tw-px-1">
        One Account. One Login. <br>
        All Your Trusted Applications
    </p>

</div>

@endsection
