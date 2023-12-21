<!-- resources/views/topview.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Artists</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f8f8f8;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        div {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0 0 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .no-data {
            color: #888;
            font-style: italic;
        }
    </style>
</head>

<body>


    <h1>Top Artists</h1>

    <div>
        <!-- Display information about the top artist -->
        <h2>Top Artist</h2>
    @if(isset($topArtist))
        <p>Name: {{ $topArtist['name'] }}</p>
        <p>Genres: {{ implode(', ', $topArtist['genres']) }}</p>
        <p>Popularity: {{ $topArtist['popularity'] }}</p>

        <!-- Check if 'followers' key and 'total' key exist before accessing -->
        
            @if(isset($topArtist['images'][0]['url']))
            <img src="{{ $topArtist['images'][0]['url'] }}" alt="Artist Image">
        @else
            <p>No artist image available.</p>
        @endif
            <!-- Add more details as needed -->
        @else
            <p>No top artist data available.</p>
        @endif
    </div>

    <div>
    <!-- Display information about the top song -->
    <h2>Top Song</h2>
    @if(isset($topSong))
        <p>Name: {{ $topSong['name'] }}</p>
        <p>Artists: {{ implode(', ', array_column($topSong['artists'], 'name')) }}</p>
        <p>Album: {{ $topSong['album']['name'] }}</p>
        @if(isset($topSong['album']['images'][0]['url']))
            <img src="{{ $topSong['album']['images'][0]['url'] }}" alt="Album Image">
        @else
            <p>No album image available.</p>
        @endif
        <!-- Add more details as needed -->
    @else
        <p>No top song data available.</p>
    @endif
</div>

</body>
</html>
