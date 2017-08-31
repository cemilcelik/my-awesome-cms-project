<div class="col">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/profile') }}">Profile</a>
                    </li>
                @endif
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="javascript:;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="nav-link" href="{{ url('admin/login') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</div>