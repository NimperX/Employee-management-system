<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $table = 'employee_categories';
    protected $primaryKey = 'id';

    public function employee()
    {
        $this->hasMany('App\Employee', 'employee_nic');
    }

    public function labor()
    {
        $this->hasMany('App\Labor', 'labor_nic');
    }
}
