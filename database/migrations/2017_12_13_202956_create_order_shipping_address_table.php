<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipping_address', function (Blueprint $table){
            $table->unsignedBigInteger('id')->primary();
            $table->integer('customer_id')->index();
            $table->integer('customer_address_id')->index();
            $table->string('email', 255)->nullable();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('postcode', 100);
            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('telephone', 100);
            $table->string('country_id', 100);
            $table->string('address_type', 100);
            $table->string('company', 200);
            $table->string('country', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_shipping_address');
    }
}
