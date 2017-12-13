<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 255);
            $table->unsignedTinyInteger('gender')->nullable();
            $table->boolean('customer_activated')->nullable();
            $table->unsignedBigInteger('group_id')->index();
            $table->string('customer_company', 150);
            $table->unsignedBigInteger('default_billing')->nullable();
            $table->unsignedBigInteger('default_shipping')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
            $table->string('customer_invoice_email', 500)->nullable();
            $table->string('customer_extra_text', 500)->nullable();
            $table->unsignedBigInteger('customer_due_date_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
