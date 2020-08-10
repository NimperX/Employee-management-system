<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->date('money_given_start_date')->nullable()->change();
            $table->date('money_given_end_date')->nullable()->change();
            $table->integer('given_employee_id')->unsigned()->nullable()->change();
            $table->string('description')->nullable();
            $table->decimal('amount_given')->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn(['description']);
        });
    }
}
