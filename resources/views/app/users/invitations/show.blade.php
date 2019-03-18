@extends('app.layouts.base')

@section('title')
Set Account Password
@endsection

@section('page-content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card mt-5">

            <div class="card-header">Set Account Password</div>

            <div class="card-body">

                <form method="post">

                    @csrf

                    <div class="form-group">
                        <label for="password">Desired Password</label>
                        <input type="password" class="form-control" name="password" id="password" required autocomplete="false">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Desired Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            required autocomplete="false">
                    </div>

                    <button type="submit" class="btn btn-primary">Set Password</button>

                </form>
            </div>
        </div>

    </div>

</div>


@endsection
