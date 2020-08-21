<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForiegnKeysToLaborTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labor', function (Blueprint $table) {
            $table->foreign('labor_type_id')->references('id')->on('project_types')->onDelete('CASCADE');
            $table->foreign('labor_category_id')->references('id')->on('employee_categories')->onDelete('CASCADE');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('CASCADE');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labor', function (Blueprint $table) {
            $table->dropForeign(['labor_type_id']);
            $table->dropForeign(['labor_category_id']);
            $table->dropForeign(['project_id']);
            $table->dropForeign(['supplier_id']);
        });
    }
}
