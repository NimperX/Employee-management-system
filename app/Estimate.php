<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $table = 'estimation';
    protected $primaryKey = 'id';

    public function employeeCategory(){
        return $this->belongsToMany('App\EmployeeCategory','employee_estimate','estimation_id','employee_id')->withPivot('cost','count','labor_type');
    }

    public function machineType(){
        return $this->belongsToMany('App\MachineType','machine_estimate','estimation_id','machine_id')->withPivot('cost','count');
    }

    public function type(){
        return $this->belongsTo('App\Type','emp_type','id');
    }
}
