<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                <li class="nav-item dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="navbarDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if (auth()->user()->nickname )
                        {{ Auth::user()->nickname }}
                        @else
                        {{ Auth::user()->name }}
                        @endif
                        <span class="caret"></span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <h6 class="dropdown-header">User Kiosk</h6>
                        <a class="dropdown-item" href="{{ route('app.users.account.show') }}">Profile</a>

                        <h6 class="dropdown-header">Developer Kiosk</h6>
                        <a class="dropdown-item" href="{{ route('app.developers.index') }}">API</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>

                @endguest
            </ul>

        </div>

    </div>
</nav>
