<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeEstimateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_estimate', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned();
            $table->bigInteger('estimation_id')->unsigned();
            $table->string('labor_type');
            $table->integer('count');
            $table->integer('cost');

            $table->foreign('employee_id')->references('id')->on('employee_categories');
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
        Schema::table('employee_estimate', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['estimation_id']);
        });
        Schema::dropIfExists('employee_estimate');
    }
}
