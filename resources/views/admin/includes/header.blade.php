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
                <a href="{{Auth::check() ? url('admin/logout') : url('admin/login')}}">
                    {{Auth::check() ? 'Logout' : 'Login'}}
                </a>
            </li>
        </ul>
    </div>
</div>
