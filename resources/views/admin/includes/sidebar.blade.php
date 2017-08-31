<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">News</a>
        <ul>
            <li>
                <a class="nav-link" href="{{ route('news.create') }}">News Add</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="{{ url('admin/logout') }}">Çıkış</a>
    </li>
</ul>