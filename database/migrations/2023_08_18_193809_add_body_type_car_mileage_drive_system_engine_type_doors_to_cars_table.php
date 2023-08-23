<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyTypeCarMileageDriveSystemEngineTypeDoorsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->integer('car_mileage')->after('year');  

            $table->unsignedBigInteger('body_type_id');
            $table->unsignedBigInteger('drive_system_id');
            $table->unsignedBigInteger('engine_type_id');
            $table->unsignedBigInteger('transmission_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
