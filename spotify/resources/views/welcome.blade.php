<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Add Advanced Styling -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .spotify-login-btn,
        .spotify-profile-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1db954;
            color: #ffffff;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            margin: 0 10px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="header">
        <h1>Spotify Api</h1>
    </div>
    <div class="container">
        <div class="navigation">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <a href="{{ route('spotify.login') }}" class="spotify-login-btn">Login with Spotify</a>
            <a href="{{ route('spotify.profile') }}" class="spotify-profile-btn">Go to Spotify Profile</a>
        </div>

        <div class="main-content">
            <!-- Your other content goes here -->
        </div>
    </div>
</body>

</html>
