<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * Invers relasi one to one
     * 
     * Membuat invers relasi dari model
     * App\Models\Administrator
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function administratorPeriod()
    {
        return $this->belongsTo('App\Models\Administrator');
    }
}
