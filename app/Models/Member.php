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

    /**
     * Relasi one to many
     * 
     * Membuat relasi one to many ke model
     * App\Models\Administrator
     * 
     * Mengambil semua data kepengurusan dari anggota
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to many
     */
    public function administrators()
    {
        return $this->hasMany(Administrator::class);
    }

    /**
     * Invers relasi one to one
     * 
     * Membuat invers relasi one to one ke model
     * App\Models\User
     * 
     * Memberikan data member (profile) dari user
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi invers relasi
     */
    public function memberUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
