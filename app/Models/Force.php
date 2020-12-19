<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    public function memberForce()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
