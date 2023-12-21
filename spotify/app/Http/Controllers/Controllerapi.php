<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Replace these variables with the actual values you want to pass
        $accessToken = 'your_access_token_value';
        $artistName = 'Radiohead'; // Replace with the artist's name or any value

        // Pass the variables to the view
        return view('welcome', [
            'accessToken' => $accessToken,
            'artistName' => $artistName,
        ]);
    }
}
