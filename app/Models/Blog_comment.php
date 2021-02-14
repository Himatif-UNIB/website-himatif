<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog_comment extends Model
{
    use HasFactory, SoftDeletes;

    public function postComments()
    {
        return $this->belongsTo(Blog_post::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Blog_comment::class, 'parent_id');
    }

    public function post()
    {
        return $this->hasOne(Blog_post::class, 'id', 'post_id');
    }
}
