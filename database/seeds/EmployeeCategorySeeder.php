<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_categories')->insert(['employee_category' => 'Senior Engineer']);
        DB::table('employee_categories')->insert(['employee_category' => 'Junior Engineer']);
        DB::table('employee_categories')->insert(['employee_category' => 'Project Supervisor']);
        DB::table('employee_categories')->insert(['employee_category' => 'Foreman']);
        DB::table('employee_categories')->insert(['employee_category' => 'Helper']);
        DB::table('employee_categories')->insert(['employee_category' => 'Multi-skilled laborers']);
        DB::table('employee_categories')->insert(['employee_category' => 'Other']);
    }
}
