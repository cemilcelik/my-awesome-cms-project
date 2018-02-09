<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('admin/dashboard') }}">Dashboard</a>
    </li>
    @role(['admin', 'news-manager'])
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
    @endrole
    @role(['admin', 'media-manager'])
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
    @endrole
    @role(['admin', 'feedback-manager'])
        <li class="nav-item">
            <a class="nav-link" href="#">Feedback</a>
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('feedback.index') }}">Feedback List</a>
                </li>
            </ul>
        </li>
    @endrole
    @role(['admin', 'admin-manager'])
        <li class="nav-item">
            <a class="nav-link" href="#">Admin</a>
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('admin.create') }}">Admin Add</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin List</a>
                </li>
            </ul>
        </li>
    @endrole
    @role(['admin', 'role-manager'])
        <li class="nav-item">
            <a class="nav-link" href="#">Role</a>
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('role.create') }}">Role Add</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('role.index') }}">Role List</a>
                </li>
            </ul>
        </li>
    @endrole
    @role(['admin', 'permission-manager'])
        <li class="nav-item">
            <a class="nav-link" href="#">Permission</a>
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('permission.create') }}">Permission Add</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('permission.index') }}">Permission List</a>
                </li>
            </ul>
        </li>
    @endrole
    <li class="nav-item">
        <a class="nav-link" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </li>
</ul>
