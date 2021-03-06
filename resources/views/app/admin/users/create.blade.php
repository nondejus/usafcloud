@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header tw-flex tw-justify-start tw-items-center">
        <span class="tw-text-2xl">Create New User</span>
    </div>

    <form action="{{ route('app.admin.users.store') }}" method="POST">

        <div class="card-body">

            @csrf

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required
                            autocomplete="false" autofocus>
                        <small class="form-text text-muted">Required</small>

                        @error('first_name')
                            @include('components.error')
                        @enderror

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required
                            autocomplete="false">
                        <small class="form-text text-muted">Required</small>

                        @error('last_name')
                            @include('components.error')
                        @enderror

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            autocomplete="false">
                        <small class="form-text text-muted">Optional</small>

                        @error('middle_name')
                            @include('components.error')
                        @enderror

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required autocomplete="false">
                <small class="form-text text-muted">Required, must be a us.af.mil address</small>

                @error('email')
                    @include('components.error')
                @enderror

            </div>


            <div class="form-check">
                <label class="form-check-label" for="needs_gsuite">
                    <input class="form-check-input" type="checkbox" id="needs_gsuite" name="needs_gsuite" value="yes">
                    <label class="form-check-label" for="needs_gsuite">
                        Provision GSuite Account?
                    </label>
                    <small class="form-text text-muted">
                        Optional, should we create a GSuite Account for this user. If checked, email account will be
                        first.last@usaf.cloud.
                        They will be emailed a temporary password for thier new account and will be required to set a
                        password the first time
                        they log in.
                    </small>
            </div>

            <p class="text-muted tw-mb-0 tw-mt-5">
                An invititation will be emailed to the user, and they will be required to set a password.
            </p>

        </div>

        <div class="card-footer tw-flex tw-justify-end">
            <button type="submit" class="btn btn-primary">Create User</button>
        </div>

    </form>

</div>
@endsection
