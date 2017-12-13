<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('increment_id', 110)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('customer_id')->index();
            $table->string('customer_email', 255);
            $table->string('status', 100);
            $table->string('marking', 100)->nullable();
            $table->decimal('grand_total', 12, 4);
            $table->decimal('sub_total', 12, 4)->nullable();
            $table->decimal('tax_amount', 12 ,4);
            $table->unsignedBigInteger('billing_address_id')->index();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->string('shipping_method', 200)->nullable();
            $table->decimal('shipping_amount', 12,4);
            $table->decimal('shipping_tax_amount',12,4);
            $table->string('shipping_description', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
