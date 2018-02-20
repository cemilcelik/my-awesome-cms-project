<div class="col">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('common.mainmenu.home') }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('common.mainmenu.about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">{{ __('common.mainmenu.news') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">{{ __('common.mainmenu.contact') }}</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('auth/profile') }}">{{ __('common.mainmenu.profile') }}</a>
                    </li>
                @endif
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="javascript:;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="nav-link" href="login">{{ __('common.mainmenu.login') }}</a>
                    @endif
                </li>
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="nav-link">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
                </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
