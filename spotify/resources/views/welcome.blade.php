<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-white-100 white:bg-dots-lighter dark:bg-white-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif
    
        <!-- Add this within the body tag of your welcome.blade.php -->
        <a href="{{ route('spotify.login') }}">Login with Spotify</a>
    </div>
    <a href="{{ route('spotify.profile') }}">Go to Spotify Profile</a>
    <a href="{{ route('spotify.topView') }}">Go to top view</a>

</body>

</html>