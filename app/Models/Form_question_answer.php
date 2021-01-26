<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Form_question_answer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $timestamps = FALSE;

    public function questionAnswers()
    {
        return $this->belongsTo(Form_question::class);
    }

    public function question()
    {
        return $this->hasOne(Form_question::class, 'id', 'question_id');
    }
}
