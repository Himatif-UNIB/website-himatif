<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Picture_gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    /**
     * Relasi many to many kategori galeri
     * 
     * Membuat relasi many to many dengan tabel `picture_gallery_category`
     * dengan tabel pivot `picture_gallery_categories`.
     * 
     * Dengan relasi ini, setiap albim bisa memiliki banyak kategori,
     * dan setiap kategori bisa dimiliki banyak galeri.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return \BelongsToMany   Relasi many to many
     */
    public function categories()
    {
        return $this->belongsToMany(Picture_gallery_category::class, 'picture_gallery_categories', 'gallery_id', 'category_id');
    }

    /**
     * Relasi one to one ke tabel `users`
     * 
     * Membuat relasi one to one ke tabel `users`
     * untuk mendapatkan informasi pemilik album.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  \hasOne Relasi one to one
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
