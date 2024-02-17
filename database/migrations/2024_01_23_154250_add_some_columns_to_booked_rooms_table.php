<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToBookedRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booked_rooms', function (Blueprint $table) {
            $table->tinyInteger('adults')->after('price');
            $table->tinyInteger('children')->after('adults')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booked_rooms', function (Blueprint $table) {
            $table->dropColumn(['adults', 'children']);
        });
    }
}
