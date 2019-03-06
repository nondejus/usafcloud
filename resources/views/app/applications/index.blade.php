@extends('app.layouts.base')

@section('title')
My Authorized Applications
@endsection

@section('page-content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card mt-5">

            <div class="card-header">My Authorized Applications</div>

            <div class="card-body">

                <p>
                    Will list all the users authorized oauth applications, with the ability to
                    revoke the permissions, as well as just an overview of the apps that they
                    have. Would like to incorporate an "app store", where we can list first
                    party applications they can add to thier profile.
                </p>

            </div>
        </div>

    </div>

</div>


@endsection
