<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBillingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_billing_address', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('customer_id')->index();
            $table->integer('customer_address_id')->nullable();
            $table->string('email', 255);
            $table->string('firstname', 200);
            $table->string('lastname', 200);
            $table->string('postcode', 100);
            $table->string('street', 200);
            $table->string('city', 250);
            $table->string('telephone', 100);
            $table->string('country_id', 100);
            $table->string('address_type', 100);
            $table->string('company', 100);
            $table->string('country', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_billing_address');
    }
}
