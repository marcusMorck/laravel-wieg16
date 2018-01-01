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

        $response = json_decode(curl_exec($ch), true);

        curl_close($ch);

        $this->info('Importing pictures from instagram');

        foreach ($response['data'] as $data){
            $dbInstagram = Instagram::findOrNew($data['id']);

            $dbInstagram->fill([
                "id" => $data['id'],
                "url" => $data['images']['standard_resolution']['url']
            ])->save();
        }

    }
}
