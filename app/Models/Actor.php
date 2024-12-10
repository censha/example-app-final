<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'authorsapp_authors';

    protected $fillable = [
        'name',
        'content',
        'last_name',
        'photo',
        'content',
        'best_job',
        'info',
        'carier',
        'seo_description',
        'seo_keywords',
        'seo_title',
    ];
}
