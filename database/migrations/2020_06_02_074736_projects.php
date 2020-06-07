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
            $table->string('project_type');
            $table->string('project_name');
            $table->string('customer_name');
            $table->integer('contact_number');
            $table->string('email');
            $table->date('project_start_date');
            $table->boolean('status');
            $table->string('senior_engineer_name');
            $table->string('project_supervisor_name');
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
