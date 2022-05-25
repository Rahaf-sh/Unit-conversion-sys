<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Product extends Model
{
    protected $fillable = ['name','price','qty_unit','qty_subunit','subunit_id'];

    public function subunit()
    {
        return $this->belongsTo(subunit::class); 
    }
}
