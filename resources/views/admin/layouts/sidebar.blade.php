<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('admin.includes.head')
</head>
<body>

    <div id="app" class="container-fluid">

        <header class="row">
            @include('admin.includes.header')
        </header>

        <div id="main" class="row">

            <!-- sidebar content -->
            <div id="sidebar" class="col-lg-3 col-sm-4">
                @include('admin.includes.sidebar')
            </div>

            <!-- main content -->
            <div id="content" class="col-lg-9 col-sm-8">
                @yield('content')
            </div>

        </div>

        <footer class="row">
            @include('admin.includes.footer')
        </footer>

    </div>

    @include('admin.includes.foot')

</body>
</html>
