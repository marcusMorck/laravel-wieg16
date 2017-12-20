<?php

namespace App\Console\Commands;

use App\Instagram;
use Illuminate\Console\Command;

class ImportInstagramPictures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:instapictures';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import instagram pictures';

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
        $ch = curl_init("https://api.instagram.com/v1/users/3787334378/media/recent/?access_token=3787334378.41b2cb7.1b436fd49af1469396453c8b91098ccc&count=60%3B");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);

        curl_close($ch);
        $links = [];

        $this->info('Importing pictures from instagram');
        $allData = json_decode($response, true);
        foreach ($allData as $lessData){

            foreach ($lessData as $impdata){

                $links[] = [
                    'link' => $impdata['link'],
                    'filter' => $impdata['filter']

                ];
            }
        }
        if ($links != null){
        foreach ($links as $link){
            $dbLink = Instagram::where('link', '=', $link)->first();
            if ($dbLink == null){
                $dbLink = new Instagram();
                $dbLink->fill($link)->save();
            }

        }
        }

    }
}
