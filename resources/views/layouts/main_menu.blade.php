<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(\App\Models\Page::query()->publish()->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)->get() as /* @var $page \App\Models\Page */$page)
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url($page->slug) }}">{{ $page->title }}</a>
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
