<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';

    public function labor()
    {
        $this->hasMany('App\Labor', 'labor_id');
    }
}