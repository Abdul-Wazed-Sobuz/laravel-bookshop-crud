<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{asset('css/header.css')}}>
    <link rel="stylesheet" href={{asset('css/footer.css')}}>
    @yield('styles')
    <title>@yield('title', 'Home Page')</title>
</head>
<body>

@include('partials.header')

<div class="content">
    @yield('content') <!-- This is where the specific page content will be inserted -->
</div>
@include('partials.footer')
</body>
</html>
