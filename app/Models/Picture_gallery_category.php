<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture_gallery_category extends Model
{
    use HasFactory;

    /**
     * @var $table  Tabel yang digunakan oleh model ini
     */
    public $table = 'gallery_categories';
    public $timestamps = false;

    /**
     * Relasi many to many kategori galeri
     * 
     * Membuat relasi many to many dengan tabel `picture_gallery`
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
    public function galleries()
    {
        return $this->belongsToMany(Picture_gallery::class, 'picture_gallery_categories');
    }

    /**
     * Mendapatkan data kategori `Tak berkategori`
     * 
     * Mendapatkan data kategori `Tak berkategori` (kategori standar).
     * Kategori ini merupakan kategori yang otomatis ditambahkan jika
     * user tidak memilih suatu kategori tertentu.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  object|null data kategori
     */
    public static function getUncategorizedData()
    {
        $data = self::where('display', false);

        return ($data->exists()) ? $data->first() : null;
    }
}
