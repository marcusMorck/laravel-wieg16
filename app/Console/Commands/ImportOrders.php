<?php

namespace App\Console\Commands;

use App\Order;
use App\OrderBillingAddress;
use App\OrderItem;
use App\OrderShippingAddress;
use Illuminate\Console\Command;

class ImportOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'importing orders from Milletech';

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
        $this->info("Importing orders...");
        $ch = curl_init("https://www.milletech.se/invoicing/export/");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $this->info("Importing orders");

        foreach ($data as $order){
            if ($order['status'] == "processing"){
                $this->info("Importing order with id:" . $order['id']);
                $dbOrder = Order::findOrNew($order['id']);
                $dbOrder->fill($order)->save();

                $billingAddress = $order['billing_address'];

                if (!isset($billingAddress)) continue;
                    $dbBillingAddress = OrderBillingAddress::findOrNew($billingAddress['id']);
                    $dbBillingAddress->fill($billingAddress)->save();

                    $shippingAddress = $order['shipping_address'];

                if (!isset($shippingAddress)) continue;
                    $dbShippingAddress = OrderShippingAddress::findOrNew($shippingAddress['id']);
                    $dbShippingAddress->fill($shippingAddress)->save();

                    $items = $order['items'];

                foreach ($items as $item){
                    $dbItems = OrderItem::findOrNew($item['id']);
                    $dbItems->fill($item)->save();
                }
            }
        }
        $this->info("Orders imported successfully!");
    }
}
