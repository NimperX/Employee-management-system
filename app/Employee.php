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
        return $this->belongsTo('App\Project', 'project_id');
    } 

    public function employeecategory()
    {
        return $this->belongsTo('App\EmployeeCategory', 'employee_category_id', 'id');
    } 

    public function type()
    {
        return $this->belongsTo('App\Type', 'employee_type_id', 'id');
    } 

    public function expense()
    {
        return $this->hasMany('App\Expense', 'expense_id');
    } 

    
}
