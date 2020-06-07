<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employee_nic');
            $table->primary(['employee_nic']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_type');
            $table->string('employee_category');
            $table->string('designation');
            $table->integer('employee_contact_number');
            $table->string('email');
            $table->boolean('employee_availability');
            $table->integer('project_id');
            $table->string('project_name');
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
