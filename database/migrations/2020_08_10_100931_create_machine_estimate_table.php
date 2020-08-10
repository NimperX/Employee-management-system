<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineEstimateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_estimate', function (Blueprint $table) {
            $table->id();
            $table->integer('machine_id')->unsigned();
            $table->bigInteger('estimation_id')->unsigned();
            $table->integer('count');
            $table->integer('cost');

            $table->foreign('machine_id')->references('id')->on('machine_types');
            $table->foreign('estimation_id')->references('id')->on('estimation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_estimate', function (Blueprint $table) {
            $table->dropForeign(['machine_id']);
            $table->dropForeign(['estimation_id']);
        });
        Schema::dropIfExists('machine_estimate');
    }
}
