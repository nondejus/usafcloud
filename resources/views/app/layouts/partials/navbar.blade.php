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
                    <button class="btn btn-primary dropdown-toggle" type="button" id="navbarDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if (auth()->user()->nickname )
                        {{ Auth::user()->nickname }}
                        @else
                        {{ Auth::user()->name }}
                        @endif
                        <span class="caret"></span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('app.users.account.show') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('app.users.applications.index') }}">My Apps</a>

                        @hasanyrole('admin|super-admin')

                        <a class="dropdown-item" href="{{ route('app.admin.dashboard.index') }}">Admin Dashboard</a>

                        @endhasrole

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                    </div>
                </li>

                @endguest
            </ul>

        </div>

    </div>
</nav>
