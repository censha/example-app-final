<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audioapp_audio';

    protected $fillable = [
        'name',
        'audio',
        'lang',
        'director',
        'deriger',
        'redactor',
        'sound_engineer',
        'composer',
        'audioapp_audio',
        'authors',
        'performers',
        'date_create',
        'category_id',
        'seo_description',
        'seo_keywords',
        'seo_title',
    ];
}
