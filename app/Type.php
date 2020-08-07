<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'project_types';
    protected $primaryKey = 'id';

    public function project()
    {
        $this->hasMany('App\Project', 'project_id');
    }

    public function employee()
    {
        $this->hasMany('App\Employee', 'employee_id');
    }

    public function labor()
    {
        $this->hasMany('App\Labor', 'labor_id');
    }
}
