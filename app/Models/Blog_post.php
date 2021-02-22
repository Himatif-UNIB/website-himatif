<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog_post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    /**
     * Relasi many to many
     * 
     * Setiap posting dapat memiliki banyak kategori,
     * dan setiap kategori dapat dimiliki banyak posting.
     * 
     * Method ini mendefinisikan relasi ke model Blog_category
     * dengan tabel pivot: `blog_post_categories`
     * 
     * @since   1.0
     * @author  mulyosyahidin95
     */
    public function categories()
    {
        return $this->belongsToMany(Blog_category::class, 'blog_post_categories', 'post_id', 'category_id');
    }

    /**
     * Relasi one to one ke model User
     * 
     * Membuat relasi one to one ke model user.
     * Seorang user dapat memiliki banyak posting,
     * tetapi sebuah posting hanya bisa dimiliki seorang user.
     * 
     * @since   1.0
     * @author  mulyosyahidin95
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Blog_comment::class, 'post_id');
    }
}
