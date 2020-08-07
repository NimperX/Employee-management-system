<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';
    protected $primaryKey = 'machine_id';

    public function machine()
    {
        $this->belongsTo('App\Project', 'project_id');
    } 

    public function type()
    {
        $this->belongsTo('App\MachineType', 'id');
    } 

}
