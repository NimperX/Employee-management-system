<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $table = 'warranties_new';
    protected $primaryKey = 'warranty_id';

    public function project()
    {
        $this->belongsTo('App\Project', 'project_id');
    } 

    public function customer()
    {
        $this->belongsTo('App\Customer', 'customer_id');
    } 

}
