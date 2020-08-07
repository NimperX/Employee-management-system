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
        $this->belongsTo('App\Type', 'id');
    } 

    public function customer()
    {
        $this->belongsTo('App\Customer', 'customer_id');
    }
    
    public function employees()
    {
        $this->hasMany('App\Employee', 'employee_id');
    }

    public function labors()
    {
        $this->hasMany('App\Labor', 'labor_id');
    }

    public function warranty()
    {
        $this->has('App\Warranty', 'warranty_id');
    }

    public function expense()
    {
        $this->hasMany('App\Expense', 'expense_id');
    } 
    
    public function machines()
    {
        $this->hasMany('App\Machine', 'machine_id');
    }
}
