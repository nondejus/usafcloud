@extends('app.layouts.skeleton')

@section('content')

<div id="app">

    @include('app.layouts.partials.navbar')

    <main>
        @yield('page-content')
    </main>

</div>

@endsection
