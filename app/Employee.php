<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_nic';

    protected $casts = [
        'employee_nic' => 'string',
    ];

}
