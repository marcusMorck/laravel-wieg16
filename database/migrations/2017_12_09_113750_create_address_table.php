<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('customer_address_id')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('postcode', 200);
            $table->string('street', 230);
            $table->string('city', 220);
            $table->string('telephone', 100);
            $table->string('country_id', 30)->nullable();
            $table->string('address_type', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
