<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees_new';
    protected $primaryKey = 'employee_id';

    protected $casts = [
        'employee_nic' => 'string',
    ];

    public function project()
    {
        $this->belongsTo('App\Project', 'project_id');
    } 

    public function employeecategory()
    {
        $this->belongsTo('App\EmployeeCategory', 'id');
    } 

    public function type()
    {
        $this->belongsTo('App\Type', 'id');
    } 

    public function expense()
    {
        $this->hasMany('App\Expense', 'expense_id');
    } 

    
}
