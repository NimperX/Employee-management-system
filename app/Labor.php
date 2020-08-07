<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    protected $table = 'labor';
    protected $primaryKey = 'labor_id';

    protected $casts = [
        'labor_nic' => 'string',
    ];

    public function project()
    {
        $this->belongsTo('App\Project', 'project_id');
    } 

    public function type()
    {
        $this->belongsTo('App\Type', 'id');
    } 
    
    public function employeecategory()
    {
        $this->belongsTo('App\EmployeeCategory', 'id');
    } 

    public function supplier()
    {
        $this->belongsTo('App\Supplier', 'supplier_id');
    } 
}
