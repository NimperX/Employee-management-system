<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'expense_id';

    protected $casts = [
        'money_given__start_date' => 'date',
        'money_given_end_date' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'given_employee_id','employee_id');
    }



}
