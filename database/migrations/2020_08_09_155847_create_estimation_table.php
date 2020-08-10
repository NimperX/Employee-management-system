<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimation', function (Blueprint $table) {
            $table->id();
            $table->string('estimate_type');
            $table->integer('emp_type')->unsigned()->nullable();
            $table->integer('int_work_days')->nullable();
            $table->integer('hire_work_days')->nullable();
            $table->integer('machine_work_days')->nullable();
            $table->decimal('oh_rate');
            $table->decimal('nbt_rate');
            $table->decimal('vat_rate');
            $table->decimal('profit');
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
        Schema::dropIfExists('estimation');
    }
}
