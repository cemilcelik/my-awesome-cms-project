<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('admin.includes.head')
</head>
<body>

    <div class="container">

        <header class="row">
            @include('admin.includes.header')
        </header>

        <div id="main" class="row">

            <!-- sidebar content -->
            <div id="sidebar" class="col-md-4">
                @include('admin.includes.sidebar')
            </div>

            <!-- main content -->
            <div id="content" class="col-md-8">
                @yield('content')
            </div>

        </div>

        <footer class="row">
            @include('admin.includes.footer')
        </footer>

        @include('admin.includes.foot')

    </div>

</body>
</html>