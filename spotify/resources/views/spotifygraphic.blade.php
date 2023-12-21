    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Graphic</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('../css/graph.css') }}">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">

    <h1>Followed Artists</h1>

    @if(isset($followedArtists) && count($followedArtists) > 0)
    <ul>
        @foreach($followedArtists as $artist)
            <li>
                <img src="{{ $artist['images'][0]['url'] }}" alt="{{ $artist['name'] }}" width="100" height="100">
                <h3>{{ $artist['name'] }}</h3>
                <p>Followers: {{ $artist['followers']['total'] }}</p>
                <a href="{{ $artist['external_urls']['spotify'] }}" target="_blank">Spotify Link</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No followed artists available.</p>
@endif

    </body>
    </html>
