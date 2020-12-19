<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $fillable = ['name', 'npm', 'force_id']
;
    public function force()
    {
        return $this->hasOne('App\Models\Force', 'id', 'force_id');
    }
}
