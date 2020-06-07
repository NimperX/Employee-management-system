<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Machines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('machine_id');
            $table->string('machine_type');
            $table->string('machine_name');
            $table->string('model_number');
            $table->date('machine_purchase_date');
            $table->boolean('machine_availability');
            $table->integer('project_id');
            $table->string('project_name');
            $table->date('machine_start_date');
            $table->date('machine_end_date');
            $table->string('additional_details');
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
        //
    }
}
