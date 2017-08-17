<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">{{ config('app.name') }}</a>
        <ul class="nav nav-tabs">
            <li><a href="/">Home</a></li>
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/news">News</a></li>
            <li><a href="/contact">Contact</a></li>
            @if (Auth::check())
                <li><a href="{{ url('auth/profile') }}">Profile</a></li>
            @endif
            <li>
                <a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}">
                    {{Auth::check() ? 'Logout' : 'Login'}}
                </a>
            </li>
        </ul>
    </div>
</div>