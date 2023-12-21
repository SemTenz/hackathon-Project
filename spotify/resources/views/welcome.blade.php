<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spotify API</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Add Advanced Styling -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #191414;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333; /* Set the default text color */
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #1db954; /* Set the heading color */
        }

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease; /* Add a smooth transition effect */
        }

        a:hover {
            color: #0056b3; /* Change the color on hover */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .navigation {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .navigation a {
            margin: 0 10px;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease; /* Add a smooth transition effect */
        }

        .navigation a.spotify-login-btn {
            background-color: #1db954;
            color: #ffffff;
        }

        .navigation a.spotify-profile-btn {
            background-color: #007bff;
            color: #ffffff;
        }

        .navigation a.spotify-graphic-btn {
            background-color: #ff6f61;
            color: #ffffff;
        }

        .navigation a:hover {
            background-color: black; /* Change the background color on hover */
        }

        .main-content {
            margin-top: 20px;
            font-size: 18px;
            line-height: 1.6;
        }

        .spoti {
            font-size: 20px;
            font-weight: bold;  
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="header">
        <h1 class="spoti">Spotify API</h1>
    </div>
    <div class="container">
        <div class="navigation">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <a href="{{ route('spotify.login') }}" class="spotify-login-btn">Login with Spotify</a>
            <a href="{{ route('spotify.profile') }}" class="spotify-profile-btn">Go to Spotify Profile</a>
            <a href="{{ route('spotify.graphic') }}" class="spotify-graphic-btn">Go to Spotify Graphic</a>
        </div>
        <div class="main-content">
            <!-- Your other content goes here -->
        </div>
    </div>
</body>

</html>
