<?php

namespace App\Http\Controllers;

use App\Twitter;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function wordCount(){
        $dbTwitter = Twitter::all()->toArray();

        $wordList = [];

        foreach ($dbTwitter as $word){
            $wordList = [
                'text' => $word['text']

            ];

            $result = explode(" ", $wordList['text']);


        }
    }
}
