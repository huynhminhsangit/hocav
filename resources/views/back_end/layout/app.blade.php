<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quản Trị</title>

    <!-- Styles -->
    <link href="{!!asset('vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    QUẢN TRỊ
                </a>
            </div>
        </nav>
        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
