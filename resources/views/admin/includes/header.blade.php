<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">{{ config('app.name') }} v0.0.1 - Admin Panel</a>
        <ul class="nav nav-tabs">
            <li><a href="/">Home</a></li>
            <li><a href="/news">News</a></li>
            <li><a href="/content">Content</a></li>
            <li><a href="/user">User</a></li>
            @if (Auth::check())
                <li>
                    <a href="{{ url('admin/profile') }}">Profile</a>
                </li>
            @endif
            <li>
                @if (Auth::check())
                    <a href="javascript:;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{ url('admin/login') }}">Login</a>
                @endif
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
        </ul>
    </div>
</div>
