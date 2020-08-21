<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';

    public function projects()
    {
        return $this->hasMany('App\Project', 'customer_id', 'customer_id');
    }

    public function warranties()
    {
        return $this->hasMany('App\Warranty', 'warranty_id');
    }

}
