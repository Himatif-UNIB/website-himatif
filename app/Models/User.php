<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPassword, HasMedia
{
    use HasApiTokens, HasFactory, HasRoles, InteractsWithMedia, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Invers relasi one to many
     * 
     * Membuat invers relasi one to many ke model
     * App\Models\Form
     * 
     * Data formulir yang dibuat oleh user {user}
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to many
     */
    public function userForm()
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * Relasi one to one
     * 
     * Membuat relasi one to one ke model
     * App\Models\Member
     * 
     * Mendapatkan data profil dari user {user}
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi iners relasi one to one
     */
    public function member() {
        return $this->hasOne(Member::class, 'user_id', 'id');
    }

    /**
     * Relasi one to one
     * 
     * Membuat relasi one to one ke model
     * App\Models\Social_auth
     * 
     * Mendapatkan data login sosial media user
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi iners relasi one to one
     */
    public function socialAuth() {
        return $this->hasOne(Social_auth::class, 'user_id', 'id');
    }

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
    public function staffUser()
    {
        return $this->belongsTo('App\Models\Staff');
    }

    /**
     * Relasi one to many
     * 
     * Membuat relasi one to many ke model
     * App\Models\Staff
     * 
     * Mengambil semua data kepengurusan dari anggota
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Definisi relasi one to many
     */
    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    /**
     * Mendapatkan URL Foto profil
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  URL Foto profil
     */
    public function getAvatar()
    {
        return isset($this->media[0])
            ? $this->getFirstMedia('avatars')
            : asset('assets/images/avatar-1.png');
    }
}
