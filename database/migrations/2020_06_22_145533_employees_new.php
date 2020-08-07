<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeesNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_new', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('employee_nic')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('employee_type_id')->unsigned();
            $table->integer('employee_category_id')->unsigned();
            $table->integer('employee_contact_number');
            $table->string('employee_email');
            $table->boolean('employee_availability');
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->primary(['employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_new');
    }
}