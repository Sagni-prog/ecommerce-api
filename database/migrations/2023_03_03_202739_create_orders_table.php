<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('billing_firstname');
            $table->string('billing_lastname');
            $table->string('billing_email');
            $table->string('billing_country');
            $table->string('billing_city');
            $table->string('billing_address_line1');
            $table->string('billing_address_line2');
            $table->double('billing_total');
            $table->string('billing_payment_gateway');
            $table->boolean('billing_payment_status')->nullable()->default(false);
            $table->boolean('billing_payment_shipment_status')->nullable()->default(false);
            $table->string('billing_error');
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
        Schema::dropIfExists('orders');
    }
};
