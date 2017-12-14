<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->integer('entity_id')->nullable();
            $table->unsignedBigInteger('entity_type_id')->nullable();
            $table->unsignedBigInteger('attribute_set_id')->nullable();
            $table->string('type_id', 100)->nullable();
            $table->string('sku', 100)->nullable();
            $table->boolean('has_options')->nullable();
            $table->boolean('required_options')->nullable();
            $table->timestamps();
            $table->boolean('status')->nullable();
            $table->string('name',200)->nullable();
            $table->unsignedBigInteger('amount_package')->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->boolean('is_salable')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
