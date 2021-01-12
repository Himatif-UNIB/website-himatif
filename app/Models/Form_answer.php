<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_answer extends Model
{
    use HasFactory;

    public function formAnswer()
    {
        return $this->belongsTo(Form::class);
    }

    public function answers()
    {
        return $this->hasMany(Form_question_answer::class, 'answer_id', 'id');
    }
}
