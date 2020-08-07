<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Labor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labor', function (Blueprint $table) {
            $table->increments('labor_id');
            $table->string('labor_nic')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('labor_type_id')->unsigned();
            $table->integer('labor_category_id')->unsigned();
            $table->integer('labor_contact_number');
            $table->string('labor_email');
            $table->boolean('labor_availability');
            $table->integer('supplier_id')->unsigned();
            $table->date('labor_hired_date');
            $table->date('labor_end_date');

            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->primary(['labor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labor');
    }
}
