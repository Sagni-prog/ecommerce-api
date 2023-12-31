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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            // $table->integer('photoable_id');
            // $table->string('photoable_type');
            $table->morphs('photoable');
            $table->string('photo_name');
            $table->string('photo_path');
            $table->string('photo_url');
            $table->integer('height')->unsigned()->nullable();
            $table->integer('width')->unsigned()->nullable();
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
        Schema::dropIfExists('photos');
    }
};
