<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Project Coin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/layout.js'])
</head>
