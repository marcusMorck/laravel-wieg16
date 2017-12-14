<?php

namespace App\Console\Commands;

use App\GroupPrice;
use App\Product;
use App\StockItem;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from MilleTech';

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
        $this->info("Importing products...");
        $ch = curl_init("https://www.milletech.se/invoicing/export/products");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER,0);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        $products = $data['products'];

        foreach ($products as $product){

            $dbProduct = Product::findOrNew($product['entity_id']);
            $dbProduct->fill($product)->save();

            $stockItems = $product['stock_item'];

            foreach ($stockItems as $stockItem){
                $dbStockItem = StockItem::findOrNew($stockItem['is_in_stock']);
                $dbStockItem->fill($stockItems)->save();
            }

            $groupPrices = $product['group_prices'];

            foreach ($groupPrices as $groupPrice){
               $dbGroupPrice = GroupPrice::findOrNew($groupPrice['price_id']);
               $dbGroupPrice->fill($groupPrice)->save();
            }
        }
    }
}
