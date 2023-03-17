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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('catagory_id')->unsigned();
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->integer('product_quantity');
            $table->string('product_by_gender');
            $table->integer('product_discount_percent')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('product_discount_start_date')->nullable();
            $table->timestamp('product_discount_end_date')->nullable();
            $table->json('features');
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
        Schema::dropIfExists('products');
    }
};
