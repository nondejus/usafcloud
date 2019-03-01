@extends('auth.layouts.app')

@section('content')

<div class="w-3/4 sm:w-3/5 md:w-1/3 lg:w-2/5 xl:w-1/4">
    <div class="card card-body p-5 border-solid border-blue border-1">

        <h2 class="text-center mb-4 text-2xl text-blue">Sign up</h2>

        <form action="{{ route('register') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                <small>You must sign up with your us.af.mil email address</small>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="flex align-items-center justify-content-between mt-4">

                <a href="{{ route('login') }}">Sign In Instead?</a>

                <button type="submit" class="btn btn-outline-primary">Sign Up</button>

            </div>

        </form>
    </div>
</div>

@endsection
