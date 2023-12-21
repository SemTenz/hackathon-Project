<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SpotifyController extends Controller
{
    public function login()
    {
        $state = $this->generateRandomString(16);

        // Store the state and intended URL in the session
        session(['spotify_auth_state' => $state, 'intended_url' => url()->previous()]);

        return Redirect::to('https://accounts.spotify.com/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => config('services.spotify.client_id'),
            'scope' => 'user-read-private user-read-email user-top-read',
            'redirect_uri' => config('services.spotify.redirect_uri')[0],
            'state' => $state,
        ]));
    }

    public function profile()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the currently authenticated user
            $user = Auth::user();

            // Fetch Spotify profile information for the authenticated user
            $spotifyProfileData = $this->fetchSpotifyUserData($user->spotify_access_token);

            // Return the view with user-specific Spotify profile data
            return view('spotifyprofile', ['spotifyProfileData' => $spotifyProfileData]);
        }

        // If the user is not authenticated, redirect to the login page
        return Redirect::route('spotify.login');
    }

    public function handleCallback(Request $request)
    {
        // Extract necessary parameters from the callback request
        $code = $request->input('code');
        $state = $request->input('state');

        // Check if the received state matches the stored one-time token
        if ($state !== session('spotify_auth_state')) {
            // Handle error: Invalid state
            return redirect()->route('spotify.login')->with('error', 'Invalid state');
        }

        // Mark the one-time token as used
        session()->forget('spotify_auth_state');

        // Log the received authorization code for debugging
        Log::info('Received Authorization Code: ' . $code);

        // Exchange the authorization code for an access token using Spotify API
        $accessToken = $this->exchangeCodeForAccessToken($code);

        // Use the access token to fetch user data from the Spotify API
        $spotifyProfileData = $this->fetchSpotifyUserData($accessToken);

        // Use the access token to fetch top artists from the Spotify API
        $topArtist = $this->getTopArtists($accessToken);

        // Use the access token to fetch most listened artist data
   $mostListenedArtist = $this->getTopSong($accessToken);
;
    // Use the access token to fetch top song from the Spotify API
    $topSong = $this->getTopSong($accessToken);

    // Now, let's use the access token to get information about a specific track
    $trackId = '2TpxZ7JUBn3uw46aR7qd6V'; // Replace with the desired track ID
    $trackInfo = $this->getSpotifyTrackInfo($accessToken, $trackId);

    // For demonstration purposes, assume a successful callback and display a success view
    return view('spotifyprofile', [
        'spotifyProfileData' => $spotifyProfileData,
        'trackInfo' => $trackInfo,
    ]);
}

private function getSpotifyTrackInfo($accessToken, $trackId)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get('https://api.spotify.com/v1/tracks/' . $trackId);

    // Dump the entire response for debugging
    Log::info('Spotify Track Info Response: ' . json_encode($response->json()));

    // Parse the response and return track data
    return $response->json();
}


private function getTopSong($accessToken)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get('https://api.spotify.com/v1/me/top/tracks?limit=1'); // Added limit to get only one top song

    // Dump the entire response for debugging
    Log::info('Top Song Response: ' . json_encode($response->json()));

    // Parse the response and return top song
    return $response->json();
    
}

    private function exchangeCodeForAccessToken($code)
    {
        
            Log::info('Exchanging Authorization Code for Access Token: ' . $code);



        $response = Http::asForm()->withOptions(['verify' =>false])->withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('services.spotify.client_id') . ':' . config('services.spotify.client_secret')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => config('services.spotify.redirect_uri')[0],
            'client_id' => config('services.spotify.client_id'),
            'client_secret' => config('services.spotify.client_secret'),
        ]);

        // Dump the entire response for debugging
        Log::info('Token Exchange Response: ' . json_encode($response->json()));

            // Parse the response and return the access token
            return $response->json()['access_token'];
        }
    

    private function fetchSpotifyUserData($accessToken)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->withOptions(['verify' =>false])->get('https://api.spotify.com/v1/me');

        // Dump the entire response for debugging
        Log::info('Spotify API Response: ' . json_encode($response->json()));

        // Parse the response and return user data
        return $response->json();
    }

    private function getTopArtists($accessToken)
{
    try {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://api.spotify.com/v1/me/top/artists?limit=1');

        if ($response->successful()) {
            $data = $response->json();
            // Check for the 'items' key in the response
            if (isset($data['items'][0])) {
                return $data['items'][0];
            }
        } else {
            Log::error('Error fetching top artists: ' . $response->body());
        }
    } catch (\Exception $e) {
        Log::error('Exception in getTopArtists: ' . $e->getMessage());
    }

    return null;
}
    
    

    private function generateRandomString($length = 16)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function graphic()
{
    // Your logic for the Spotify graphic route goes here
    // This method should handle the functionality related to displaying the Spotify graphic

    // Example: Redirect to a Spotify graphic URL
    return Redirect::route('spotify.graphic');
}


public function getFollowedArtists()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the currently authenticated user
            $user = Auth::user();

            // Fetch followed artists using the user's access token
            $accessToken = $user->spotify_access_token;

            // Log the access token for debugging
            Log::info('Spotify Access Token: ' . $accessToken);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.spotify.com/v1/me/following?type=artist');

            // Log the entire API response for debugging
            Log::info('Spotify API Response: ' . $response->status() . ' - ' . $response->body());

            // Check if the request was successful
            if ($response->successful()) {
                $followedArtists = $response->json();

                // Log the response to inspect the data
                Log::info('Followed Artists API Response: ' . json_encode($followedArtists));

                // Return the spotifygraphic view with followedArtists data
                return view('spotifygraphic', compact('followedArtists'));
            } else {
                // Log the error response
                Log::error('Error fetching followed artists: ' . $response->body());

                // Handle the error, for example, redirect the user to an error page
                return view('error');
            }
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('spotify.login');
    }


}
