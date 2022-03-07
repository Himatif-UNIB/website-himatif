<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Form extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $casts = [
        'max_fill_date' => 'datetime',
        'closed_at' => 'datetime',
        'publish_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Form_question::class);
    }

    public function answers()
    {
        return $this->hasMany(Form_answer::class);
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userAlreadyAnswered()
    {
        return $this->answers()->where([
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent')
        ]);
    }
}
