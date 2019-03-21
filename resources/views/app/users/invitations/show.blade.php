@extends('app.layouts.base')

@section('title')
Set Account Password
@endsection

@section('page-content')

<div class="row justify-content-center">

    <div class="col-md-8 mt-5">

        <h2 class="text-2xl">Hello, good to see you!</h2>
        <p class="text-xl text-muted">Please set an account password for future logins</p>

        <div class="card">

            <div class="card-body">


                <form method="post">

                    @csrf

                    <div class="form-group">
                        <label for="password">Desired Password</label>
                        <input type="password" class="form-control" name="password" id="password" required
                            autocomplete="false">
                        <small class="form-text text-muted">Minimum of 8 characters</small>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Desired Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation" required autocomplete="false">
                        <small class="form-text text-muted">Retype your desired password</small>
                    </div>


                    <button type="submit" class="btn btn-primary">Set Password And Login</button>

                </form>
            </div>
        </div>

    </div>

</div>


@endsection
