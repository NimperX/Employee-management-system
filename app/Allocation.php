<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    protected $table = 'employee_allocation';
    protected $primaryKey = 'allocation_id';

    protected $casts = [
        'allocation_id' => 'string',
    ];

    protected $fillable = [
        'employee_nic', 'first_name', 'last_name', 'employee_type', 'employee_category', 'designation', 'employee_contact_number', 'email', 'employee_availability'
    ];

    public $timestamps = false;

    public function project()
    {
        return $this->hasMany('App\Project');
    }
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'id');
    } 
    
    public function employeecategory()
    {
        return $this->belongsTo('App\EmployeeCategory', 'id');
    } 

}
