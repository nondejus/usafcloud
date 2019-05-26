@extends('auth.layouts.app')

@section('page-title')
Register
@endsection

@section('content')

<div class="tw-w-3/4 sm:tw-w-3/5 md:tw-w-1/3 lg:tw-w-2/5 xl:tw-w-1/5">

    <h1 class="tw-text-center tw-text-gray-600 tw-my-6 tw-px-1">
        USAF.Cloud
    </h1>

    <div class="card card-body tw-p-10">

        <h2 class="tw-text-center tw-mb-6 tw-text-3xl">Register</h2>

        <form action="{{ route('register') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                    required autofocus>
                <small>You must sign up with your us.af.mil email address</small>

                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name"
                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                    value="{{ old('first_name') }}" required>

                @error('first_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name"
                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                    value="{{ old('last_name') }}" required>

                @error('last_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror

            </div>

            <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-mt-6">

                <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>

                <a class="tw-block tw-mt-6" href="{{ route('login') }}">Sign In Instead?</a>

            </div>

        </form>

    </div>

    <p class="tw-text-center tw-text-gray-500 tw-mt-5 tw-px-1">
        One Account. One Login. <br>
        All Your Trusted Applications
    </p>

</div>

@endsection
