<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Showcase extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';

    public const TYPE_APP = 'app';
    public const TYPE_MULTIMEDIA = 'multimedia';
    public const TYPE_ML_MODEL = 'ml_model';

    public $append = ['tag_array', 'technologies_array'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Showcase_category::class);
    }

    public function getTagArrayAttribute()
    {
        return $this->tags ? explode(',', $this->tags) : [];
    }

    public function getTechnologiesArrayAttribute()
    {
        return $this->technologies ? explode(',', $this->technologies) : [];
    }
}
