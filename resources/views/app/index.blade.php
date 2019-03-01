@extends('app.layouts.base')

@section('title')
Home
@endsection

@section('page-content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card mt-5">

            <div class="card-header">API Stuff</div>

            <div class="card-body">
                <passport-clients class="my-3"></passport-clients>
                <passport-authorized-clients class="my-3"></passport-authorized-clients>
                {{-- <passport-personal-access-tokens class="my-3"></passport-personal-access-tokens> --}}
            </div>
        </div>

    </div>

</div>


@endsection
