<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Subunit extends Model
{
    protected $fillable = ['subunit','ratio','unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class); 
    }
}
