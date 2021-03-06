<?php

namespace App\Http\Controllers;

use App\Twitter;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function wordCount(){
        //detta skulle kunna vara en function i models
        $dbTwitter = Twitter::all();

        $wordList = [];

        foreach ($dbTwitter as $tweet){
            $wordList = array_merge($wordList, explode(" ", $tweet));
        }
            $words = array_unique($wordList);
            foreach ($words as $word => $value){

                foreach ($wordList as $word2){
                    if (strpos($word2, $word) !== false){
                        $words[$word] = $words[$word] ++;
                    }
                }
            }
             $result = (array_count_values($wordList));
            return response()->json($result);

    }

    public function excludeWords(){
        //detta skulle kunna vara en function i models
        $filter = array('SUV', 'XC90', '@VolvoCarUSA', '8', 'Driven:');
        $dbTwitter = Twitter::all();
        $wordList = [];

        foreach ($dbTwitter as $tweet){
            $wordList = array_merge($wordList, explode(" ", $tweet));
        }

        foreach ($wordList as $key => $value){
            if (in_array($value, $filter)){
                unset($wordList[$key]);
            }
        }
        $result = array_count_values($wordList);
        return response()->json($result);
    }

    public function searchTweet(Request $request){

        $tweets = Twitter::searchTweetCount($request->bearertoken, $request->searchtweet);

        return View('twitter/show', ['tweets' => $tweets]);
    }
}
