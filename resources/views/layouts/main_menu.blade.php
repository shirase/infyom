<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(
                app(\App\Repositories\PageRepository::class)->buildNav()
                as $nav
            )
                <li class="nav-item {{ $nav['items'] ? 'dropdown' : '' }}">
                    <a class="nav-link {{ \Request::is($nav['item']->slug) || \Request::is($nav['item']->slug . '/*') ? 'active' : '' }} {{ $nav['items'] ? 'dropdown-toggle' : '' }}" @if ($nav['items'])data-toggle="dropdown"@endif href="{{ !$nav['items'] ? url($nav['item']->slug) : '#' }}">{{ $nav['item']->title }}</a>
                    @if ($nav['items'])
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($nav['items'] as $page)
                                <a class="dropdown-item {{ \Request::is($page->slug) || \Request::is($page->slug . '/*') ? 'active' : '' }}" href="{{ url($page->slug) }}">{{ $page->title }}</a>
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
