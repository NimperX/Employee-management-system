<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert(['project_type_name' => 'Marine']);
        DB::table('project_types')->insert(['project_type_name' => 'Mechanical']);
        DB::table('project_types')->insert(['project_type_name' => 'Civil']);
        DB::table('project_types')->insert(['project_type_name' => 'Electrical']);
    }
}
