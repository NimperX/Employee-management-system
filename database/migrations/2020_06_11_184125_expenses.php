<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Expenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('expense_id');
            $table->integer('project_id')->unsigned();
            $table->decimal('amount_given');
            $table->date('money_given_start_date');
            $table->date('money_given_end_date');
            $table->decimal('amount_spent')->nullable()->default(0);
            $table->integer('given_employee_id')->unsigned();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
