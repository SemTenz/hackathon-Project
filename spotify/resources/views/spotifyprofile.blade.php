<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spotify Profile</title>
</head>
<body>

    <h1>Spotify Profile</h1>
    <a href="{{ route('spotify.graphic') }}">Go to Spotify graphic</a>


    @if(isset($spotifyProfileData['display_name']))
        <p>
            <strong>Display Name:</strong> {{ $spotifyProfileData['display_name'] }}
        </p>
    @else
        <p>
            <strong>Display Name:</strong> Not available
        </p>
    @endif

    @if(isset($spotifyProfileData['followers']))
        <p>
            <strong>Followers:</strong> 
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

</body>
</html>
