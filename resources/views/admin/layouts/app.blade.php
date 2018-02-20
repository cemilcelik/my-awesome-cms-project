<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>

    <div id="app" class="container">

        <header class="row">
            @include('admin.includes.header')
        </header>

        <div id="main" class="row">
            @yield('content')
        </div>

        <footer class="row">
            @include('admin.includes.footer')
        </footer>

    </div>

    @include('admin.includes.foot')
    
</body>
</html>
