<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('news.index') }}">News</a>
            <ul>
                <li><a href="{{ route('news.create') }}">News Add</a></li>
            </ul>
        </li>
        <li><a href="{{ url('admin/logout') }}">Çıkış</a></li>
    </ul>
</nav>
