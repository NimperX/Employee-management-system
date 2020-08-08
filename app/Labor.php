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
        return $this->belongsTo('App\Project', 'project_id');
    } 

    public function type()
    {
        return $this->belongsTo('App\Type', 'labor_type_id','id');
    } 
    
    public function employeecategory()
    {
        return $this->belongsTo('App\EmployeeCategory', 'labor_category_id', 'id');
    } 

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id','supplier_id');
    } 
}
