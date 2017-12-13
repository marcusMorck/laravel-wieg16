<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('order_id')->index();
            $table->integer('item_id')->index();
            $table->timestamps();
            $table->string('name', 200);
            $table->string('sku', 100);
            $table->integer('qty');
            $table->decimal('price', 12, 4);
            $table->decimal('tax_amount', 12, 4);
            $table->decimal('row_total', 12, 4);
            $table->decimal('price_incl_tax', 12, 4);
            $table->decimal('total_incl_tax', 12, 4);
            $table->decimal('tax_percent', 12, 4);
            $table->decimal('amount_package', 12, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
