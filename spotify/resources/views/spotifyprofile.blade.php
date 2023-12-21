<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Spotify Profile</title>
    <style>
          body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #191414;
            color: #fff;
            margin: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .second {
            margin-top: 20px
        }

        h1 {
            color: #1DB954;
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
            color: #1DB954;
            font-size: 1.2em;
        }

        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            border: 5px solid #1DB954;   
        }

        img:hover {
            transform: scale(1.2);
        }

        a {
            color: #1DB954;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0f803f;
            text-decoration: underline;
        }

        .home {
            font-size: 40px;
            font-weight: bold;
            margin-top: 50px;
        }

        .spotify-home-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1db954;
            color: #ffffff;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .profile-info {
                flex-direction: row;
                justify-content: space-around;
            }

            .profile-info > div {
                flex: 1; /* Equal width for both divs */
            }
        }
    </style>
</head>
<body class="antialiased">
    <div>
        @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif
        <div>
            <h1>Spotify Profile</h1>

            @if(isset($spotifyProfileData['display_name']))
                <p>
                    <strong>Naam:</strong> {{ $spotifyProfileData['display_name'] }}
                </p>
            @else
                <p>
                    <strong>Display Name:</strong> Not available
                </p>
            @endif

            @if(isset($spotifyProfileData['followers']))
                <p>
                    <strong>Volgers:</strong> 
                    @if(is_array($spotifyProfileData['followers']))
                        {{ implode('', $spotifyProfileData['followers']) }}
                    @else
                        {{ $spotifyProfileData['followers'] }}
                    @endif
                </p>
            @else
                <p>
                    <strong>Followers:</strong> Not available
                </p>
            @endif
        </div>
        <div>
            @if(isset($spotifyProfileData['images']) && count($spotifyProfileData['images']) > 0)
                <div>
                    <img src="{{ $spotifyProfileData['images'][0]['url'] }}" alt="Profile Image">
                </div>
            @else
                <div>
                    <p>
                        <strong>Profile Image:</strong> Not available
                    </p>
                </div>
            @endif
    </div>
    <div class="second">
        @if(isset($spotifyProfileData['external_urls']['spotify']))
            <p>
                <strong>Spotify link:</strong> 
                <a href="{{ $spotifyProfileData['external_urls']['spotify'] }}" target="_blank">{{ $spotifyProfileData['external_urls']['spotify'] }}</a>
            </p>
        @else
            <p>
                <strong>Spotify Profile URL:</strong> Not available
            </p>
        @endif

        @if(isset($spotifyProfileData['email']))
            <p>
                <strong>Email:</strong> {{ $spotifyProfileData['email'] }}
            </p>
        @else
            <p>
                <strong>Email:</strong> Not available
            </p>
        @endif

        @if(isset($spotifyProfileData['product']))
            <p>
                <strong>Product Type:</strong> {{ $spotifyProfileData['product'] }}
            </p>
        @else
            <p>
                <strong>Product Type:</strong> Not available
            </p>
        @endif

        @if(isset($spotifyProfileData['country']))
            <p>
                <strong>Land:</strong> {{ $spotifyProfileData['country'] }}
            </p>
        @else
            <p>
                <strong>Country:</strong> Not available
            </p>
        @endif
    </div>
    <a class="spotify-home-btn" href="{{ url('/') }}">Home</

    

    
</body>
</html>
