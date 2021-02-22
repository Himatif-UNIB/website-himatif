<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Relasi many to many
     * 
     * Setiap posting dapat memiliki banyak kategori,
     * dan setiap kategori dapat dimiliki banyak posting.
     * 
     * Method ini mendefinisikan relasi ke model Blog_post
     * dengan tabel pivot: `blog_post_categories`
     * 
     * @since   1.0
     * @author  mulyosyahidin95
     */
    public function posts()
    {
        return $this->belongsToMany(Blog_post::class, 'blog_post_categories', 'post_id', 'category_id');
    }

    /**
     * Data kategori "uncategorized"
     * 
     * Mendapatkan data kategori "tak berkategori".
     * Kategori ini ditandai dengan flag `display` false
     * 
     * @since   1.0
     * @author  mulyosyahidin95
     * 
     * @return  object  data kategori
     */
    public static function getUncategorizedData()
    {
        $data = self::where('display', false);

        return ($data->exists()) ? $data->first() : null;
    }
}
