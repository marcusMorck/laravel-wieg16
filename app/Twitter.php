<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'twitter';

    protected $fillable = ['id', 'created_at', 'text'];

    static public function searchTweetCount($bearerToken, $tweetSearch){
        $ch = curl_init("https://api.twitter.com/1.1/search/tweets.json?q=$tweetSearch");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "authorization: Bearer $bearerToken",
            "cache-control: no-cache",
            "postman-token: fea22e01-0b38-73a5-eaf7-a34ac6f191f5"
        ));
        $wordList = [];
        $responses = json_decode(curl_exec($ch), true);
        curl_close($ch);

        foreach ($responses['statuses'] as $tweet ){

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
        asort($result);
        $finalResult = array_slice(array_reverse($result),0,10);

        return $finalResult;
    }
}
