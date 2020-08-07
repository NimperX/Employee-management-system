<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';
    protected $primaryKey = 'machine_id';

    public function machine()
    {
        return $this->belongsTo('App\Project', 'project_id');
    } 

    public function type()
    {
        return $this->belongsTo('App\MachineType', 'machine_type_id');
    } 

}
