<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $fillable = ['name', 'npm', 'force_id'];

    /**
     * Relasi one to one
     * 
     * Mendefinisikan relasi one to one ke model
     * App\Models\Force (tabel forces).
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  definisi relasi
     */
    public function force()
    {
        return $this->hasOne('App\Models\Force', 'id', 'force_id');
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
    public function administratorMember()
    {
        return $this->belongsTo('App\Models\Administrator');
    }
}
