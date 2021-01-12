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
}
