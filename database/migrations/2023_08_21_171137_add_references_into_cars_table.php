<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesIntoCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function(Blueprint $table) {
            $table->foreign('body_type_id')->references('id')->on('body_type');
            $table->foreign('drive_system_id')->references('id')->on('drive_system');
            $table->foreign('engine_type_id')->references('id')->on('engine_type');
            $table->foreign('transmission_type_id')->references('id')->on('transmission_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
