<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_question extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    public function formQuestion()
    {
        return $this->belongsTo(Form::class);
    }

    public function questionOfAnswer()
    {
        return $this->belongsTo(Form_question_answer::class);
    }

    public function formQuestionAnswers()
    {
         return $this->hasMany(Form_question_answer::class, 'question_id');
    }
}
