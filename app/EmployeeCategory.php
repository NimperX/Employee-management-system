<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $table = 'employee_categories';
    protected $primaryKey = 'id';

    public function employee()
    {
        return $this->hasMany('App\Employee', 'employee_nic');
    }

    public function labor()
    {
        return $this->hasMany('App\Labor', 'labor_nic');
    }

    public function estimate()
    {
        return $this->belongsToMany('App\Estimate','employee_estimate','employee_id','estimation_id');
    }
}
