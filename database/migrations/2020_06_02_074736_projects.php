<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->integer('project_type_id')->unsigned();
            $table->string('project_name');
            $table->string('project_location');
            $table->integer('customer_id')->unsigned();
            $table->date('project_start_date');
            $table->date('estimated_project_end_date');
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
        Schema::dropIfExists('projects');
    }
}
