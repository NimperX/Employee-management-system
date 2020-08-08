<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'project_types';
    protected $primaryKey = 'id';

    public function project()
    {
        return $this->hasMany('App\Project', 'project_id');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee', 'employee_id');
    }

    public function labor()
    {
        return $this->hasMany('App\Labor', 'labor_id');
    }
}
