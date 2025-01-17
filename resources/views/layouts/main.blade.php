<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Add your CSS and scripts -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <main>   
         @yield('content')
    </main>
</body>

</html>