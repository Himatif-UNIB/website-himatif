<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * Inverse relasi
     * 
     * Mendifinisikan inverse relasi one to one dari model
     * App\Models\Member
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function memberForce()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
