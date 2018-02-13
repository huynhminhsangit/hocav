<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <title>Quản Trị</title>
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
     <strong class="h4"> QUẢN TRỊ</strong>
 </nav>
 @yield('content')
 <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
