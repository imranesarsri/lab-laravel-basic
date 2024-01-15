<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab laravel basic</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        @include('Layouts.Navbar')
        @include('Layouts.Sidebar')
        <div class="content-wrapper" style="min-height: 1302.4px;">
            @yield('content')
        </div>
        @include('Layouts.Footer')
    </div>
</body>

</html>
