<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTags extends Model
{
    use HasFactory;

    protected $table = 'adminapp_metategs';

    protected $fillable = [
        'seo_description',
        'seo_keywords',
        'page',
    ];



}
