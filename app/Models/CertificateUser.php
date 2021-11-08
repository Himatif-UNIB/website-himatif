<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateUser extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'certificate_id', 'user_name'];
}
