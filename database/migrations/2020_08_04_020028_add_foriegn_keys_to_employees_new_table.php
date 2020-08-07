<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForiegnKeysToEmployeesNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees_new', function (Blueprint $table) {
            $table->foreign('employee_type_id')->references('id')->on('project_types')->onDelete('CASCADE');
            $table->foreign('employee_category_id')->references('id')->on('employee_categories')->onDelete('CASCADE');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees_new', function (Blueprint $table) {
            $table->dropForeign(['employee_type_id']);
            $table->dropForeign(['employee_category_id']);
            $table->dropForeign(['project_id']);
        });
    }
}
