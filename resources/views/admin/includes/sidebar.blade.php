<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('admin/dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">News</a>
        <ul>
            <li>
                <a class="nav-link" href="{{ route('news.create') }}">News Add</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('news.index') }}">News List</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Media</a>
        <ul>
            <li>
                <a class="nav-link" href="{{ route('media.create') }}">Media Upload</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('media.index') }}">Media List</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </li>
</ul>
