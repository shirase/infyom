<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(
                \App\Helpers\NavHelper::buildNav()
                as $nav
            )
                <li class="nav-item {{ $nav['items'] ? 'dropdown' : '' }}">
                    <a class="nav-link {{ $nav['active'] ? 'active' : '' }} {{ $nav['items'] ? 'dropdown-toggle' : '' }}" @if ($nav['items'])data-toggle="dropdown"@endif href="{{ !$nav['items'] ? $nav['url'] : '#' }}">{{ $nav['label'] }}</a>
                    @if ($nav['items'])
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($nav['items'] as $nav2)
                                <a class="dropdown-item {{ $nav2['active'] ? 'active' : '' }}" href="{{ $nav2['url'] }}">{{ $nav2['label'] }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            @if (Route::has('login'))
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endguest
            @endif
        </ul>
    </div>
</nav>
