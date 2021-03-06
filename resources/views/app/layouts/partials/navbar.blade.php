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
                @auth

                    <!-- Notifications -->
                    <li class="nav-item tw-flex tw-justify-center tw-items-center">
                        <a class="nav-link" href="{{ route('app.users.account.index') }}" title="Dashboard">
                            @svg('home')
                        </a>
                    </li>

                    <!-- User Menu Dropdown -->
                    <li class="nav-item dropdown">

                        <button class="btn btn-link dropdown-toggle hover:tw-no-underline focus:tw-no-underline" type="button"
                            id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            title="Menu">

                            @if(auth()->user()->avatar)

                                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                                    class="tw-w-8 tw-rounded-full tw-inline-block">

                            @else

                                {{ auth()->user()->name }}

                            @endif

                            <span class="caret"></span>

                        </button>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('app.users.account.notifications') }}"
                                title="Notifications">
                                @svg('bell', 'tw-text-gray tw-leading-none tw-mr-2 tw-inline-block')
                                Notifications ({{ auth()->user()->notifications->count() }})
                            </a>

                            @hasanyrole('admin|super-admin')

                            <a class="dropdown-item" href="{{ route('app.admin.dashboard.index') }}">
                                @svg('settings', 'tw-text-gray tw-leading-none tw-mr-2 tw-inline-block')
                                Admin Dashboard
                            </a>

                            @endhasrole

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                        </div>
                    </li>

                @endauth

            </ul>

        </div>

    </div>
</nav>
