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
                @if (Auth::check())
                    <a href="javascript:;" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="login">Login</a>
                @endif
            </li>
        </ul>
    </div>
</div>