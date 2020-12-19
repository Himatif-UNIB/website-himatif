<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Division extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = FALSE;

    /**
     * Invers relasi one to one
     * 
     * Membuat definisi invers relasi dari model
     * App\Models\Position
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function positionDivision()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
