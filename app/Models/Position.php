<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * Definisi relasi one to one
     * 
     * Mendifinisikan relasi one to one ke model
     * App\Models\Position.
     * Relasi ini terhubung ke dirinya sendiri.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  definisi relasi one to one
     */
    public function parent()
    {
        return $this->hasOne('App\Models\Position', 'id', 'parent_id');
    }

    /**
     * Invers relasi one to one
     * 
     * Mendefinisikan invers relasi one to one dari method
     * self::parent()
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  definisi invers relasi
     */
    public function positionParent()
    {
        return $this->belongsTo('App\Models\Position');
    }

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
}
