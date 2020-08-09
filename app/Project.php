<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'project_id';

    protected $casts = [
        'project_start_date' => 'date',
        'estimated_project_end_date' => 'date',
    ];

    public function type()
    {
        return $this->belongsTo('App\Type', 'project_type_id', 'id');
    } 

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    
    public function employees()
    {
        return $this->hasMany('App\Employee', 'employee_id');
    }

    public function labors()
    {
        return $this->hasMany('App\Labor', 'labor_id');
    }

    public function warranty()
    {
        return $this->hasOne('App\Warranty', 'warranty_id');
    }

    public function expense()
    {
        return $this->hasMany('App\Expense', 'expense_id');
    } 
    
    public function machines()
    {
        return $this->hasMany('App\Machine', 'machine_id');
    }
}
