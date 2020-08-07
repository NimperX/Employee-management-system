<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_company_name');
            $table->string('name_of_contact_person');
            $table->string('supplier_contact_number');
            $table->string('supplier_email');
            $table->text('supplier_address');
            $table->integer('number_of_employees_hired')->default(0);
            $table->date('hired_date');
            $table->date('estimated_end_date');
            $table->string('additional_remarks');
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
        Schema::dropIfExists('suppliers');
    }
}
