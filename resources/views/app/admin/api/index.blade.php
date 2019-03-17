@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-start align-items-center">
        <span class="text-xl">Manage Your API Applications</span>
    </div>

    <div class="card-body">

        <passport-clients class="my-3"></passport-clients>
        <passport-authorized-clients class="my-3"></passport-authorized-clients>
        <passport-personal-access-tokens class="my-3"></passport-personal-access-tokens>

    </div>

</div>

@endsection
