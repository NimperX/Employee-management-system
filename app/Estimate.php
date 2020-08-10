<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $table = 'estimation ';
    protected $primaryKey = 'id';

    public function employeeCategory(){
        return $this->belongsToMany('App\EmployeeCategory');
    }

    public function machineType(){
        return $this->belongsToMany('App\MachineType');
    }
}
