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
     * App\Models\Staff
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function staffPosition()
    {
        return $this->belongsTo('App\Models\Staff', 'id', 'position_id');
    }

    /**
     * Relasi one to one
     * 
     * Membuat relasi one to one ke model
     * App\Models\Division
     * 
     * Setiap jabatan dapat menjadi bagian dari suatu divisi, atau tidak.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi
     */
    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'division_id');
    }
}
