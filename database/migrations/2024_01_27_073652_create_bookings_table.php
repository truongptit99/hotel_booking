<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('contact_first_name', 100);
            $table->string('contact_last_name', 100);
            $table->string('phone_number', 50);
            $table->string('email');
            $table->string('address');
            $table->string('zip_code', 10);
            $table->double('total_price');
            $table->tinyInteger('payment_status')->comment('1: success, 2: failed, 3: pending');
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
        Schema::dropIfExists('bookings');
    }
}
