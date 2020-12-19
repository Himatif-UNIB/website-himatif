<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    public function parent()
    {
        return $this->hasOne('App\Models\Position', 'id', 'parent_id');
    }

    public function positionParent()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
