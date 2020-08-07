<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForiegnKeysToWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('CASCADE');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['customer_id']);
        });
    }
}
