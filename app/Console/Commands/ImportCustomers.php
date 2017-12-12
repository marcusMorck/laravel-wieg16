<?php

namespace App\Console\Commands;

use App\Address;
use App\Companies;
use App\Customer;
use Illuminate\Console\Command;

class ImportCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing customers from Milletech';

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
        $this->info("Importing customers...");
        $ch = curl_init("https://www.milletech.se/invoicing/export/customers");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $companies = [];
        $this->info("Importing Customers");
        foreach ($data as $customer){

        $companies[] = $customer['customer_company'];
        $this->info("Importing customer with id " . $customer['id']);
        $dbCustomer = Customer::findOrNew($customer['id']);
        $dbCustomer->fill($customer)->save();

        $address = $customer['address'];

        if (!isset($address)) continue;
        $dbAddress = Address::findOrNew($address['id']);
        $dbAddress->fill($address)->save();


        }
        array_unique($companies);
        foreach ($companies as $company){

            $dbCompany = Companies::where("customer_company", "=", $company)->first() ?? new Companies();
            $dbCompany->fill(['company_name' => 'customer_companya']);
        }
        $this->info("Customers imported");
    }
}
