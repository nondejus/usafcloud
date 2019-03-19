@extends('app.layouts.base')

@section('title')
My Account
@endsection

@section('page-content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card mt-5">

            <div class="card-header">My Account Settings</div>

            <div class="card-body">
                <form method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $user->middle_name }}">
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $user->nickname }}"
                            placeholder="...">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

    </div>

</div>


@endsection
