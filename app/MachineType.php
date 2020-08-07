<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    protected $table = 'machine_types';
    protected $primaryKey = 'id';

    public function machine()
    {
        $this->hasMany('App\Machine', 'machine_id');
    }
}
