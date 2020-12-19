<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * Invers relasi one to one
     * 
     * Membuat definisi invers relasi dari model
     * App\Models\Administrator
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function administratorPosition()
    {
        return $this->belongsTo('App\Models\Administrator');
    }

    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'division_id');
    }
}
