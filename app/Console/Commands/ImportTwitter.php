<?php

namespace App\Console\Commands;

use App\Twitter;
use Illuminate\Console\Command;

class ImportTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importing tweets from twitter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Importing tweets...");
        $ch = curl_init("https://api.twitter.com/1.1/search/tweets.json?q=volvo");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "authorization: Bearer AAAAAAAAAAAAAAAAAAAAAH3T3gAAAAAAUymP0dIzXTzpMLcGUjzB4JgwsJE%3DFo7Y1I39Br86zy718szrKxai2y1W86CxIsOAkhV29vSGs7i2Rz",
        "cache-control: no-cache",
        "postman-token: fea22e01-0b38-73a5-eaf7-a34ac6f191f5"
    ));

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        foreach ($data['statuses'] as $status){
            $dbTwitter = Twitter::findOrNew($status['id']);

           $dbTwitter->fill([
               'id' => $status['id'],
               'text' => $status['text']
           ])->save();
        }
    }
}
