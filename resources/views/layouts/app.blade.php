<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body>

    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <div class="row main">
            @yield('content')
        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>

    @include('includes.foot')
    
</body>
</html>