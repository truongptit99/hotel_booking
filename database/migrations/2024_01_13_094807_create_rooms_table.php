<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255);
            $table->string('name', 200)->unique();
            $table->string('slug', 255)->unique();
            $table->tinyInteger('type')->comment('1: single, 2: double, 3: deluxe');
            $table->double('price');
            $table->tinyInteger('max_adult');
            $table->tinyInteger('max_children')->default(0)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
