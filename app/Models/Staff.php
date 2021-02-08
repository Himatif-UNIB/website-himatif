<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * Definisi relasi one to one
     * 
     * Membuat definisi relasi one to one ke model
     * App\Models\Member
     * 
     * Setiap pengurus mempunyai satu data anggota
     * (setiap seorang anggota menjadi pengurus dengan satu jabatan)
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to one
     */
    public function member()
    {
        return $this->hasOne('App\Models\Member', 'id', 'member_id');
    }

    /**
     * Definisi relasi one to one
     * 
     * Membuat definisi relasi one to one ke model
     * App\Models\Position
     * 
     * Setiap pengurus mempunyai satu jabatan.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to one
     */
    public function position()
    {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    }

    /**
     * Definisi relasi one to one
     * 
     * Membuat definisi relasi one to one ke model
     * App\Models\Periode
     * 
     * Setiap anggota dapat menjadi pengurus di satu periode atau lebih.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to one
     */
    public function period()
    {
        return $this->hasOne('App\Models\Period', 'id', 'period_id');
    }

    /**
     * Mengembalikan relasi
     * 
     * Mengembalikan relasi satu ke banyak dari model
     * App\Models\Member
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Invers relasi
     */
    public function memberStaff()
    {
        return $this->belongsTo(Member::class);
    }
}
