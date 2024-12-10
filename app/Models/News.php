<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'newsapp_news';

    protected $fillable = [
        'name',
        'photo_news',
        'title',
        'content',
        'category_id',
        'category2_id',
        'seo_description',
        'seo_keywords',
        'seo_title',
        'main',
        'created_at'
    ];

}
