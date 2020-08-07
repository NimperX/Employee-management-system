<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machine_types')->insert(['machine_type_name' => 'Backhoe']);
        DB::table('machine_types')->insert(['machine_type_name' => 'Wacker']);
        DB::table('machine_types')->insert(['machine_type_name' => 'Welding machine']);
        DB::table('machine_types')->insert(['machine_type_name' => 'Other']);
    }
}
