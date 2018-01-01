<?php

namespace App\Http\Controllers;

use App\Instagram;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index(){
        $ch = curl_init("https://api.instagram.com/v1/users/3787334378/media/recent/?access_token=3787334378.41b2cb7.1b436fd49af1469396453c8b91098ccc&count=60%3B");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);
        return response()->json($data);

    }

    public function show(){
        $url = Instagram::all();
        return view('instagram.instagram', ['images' => $url]);
    }
}
