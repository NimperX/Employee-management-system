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
            $table->engine = 'InnoDB';
            $table->increments('machine_id');
            $table->integer('machine_type_id')->unsigned();
            $table->integer('project_id')->unsigned()->nullable();
            $table->string('machine_name')->nullable();
            $table->string('model_number')->nullable();
            $table->date('machine_purchase_date');
            $table->boolean('machine_availability');
            $table->string('additional_details')->nullable();
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
        Schema::dropIfExists('machines');
    }
}
