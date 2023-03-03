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
            $table->integer('price');
            $table->text('description')->nullable();
            $table->integer('product_quantity');
            $table->string('product_by_gender');
            $table->integer('product_discount_percent');
            $table->date('product_discount_start_date')->nullable();
            $table->date('product_discount_end_date')->nullable();
            $table->json('features');
            $table->integer('product_image_id');
            $table->foreign('product_image_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade');
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
