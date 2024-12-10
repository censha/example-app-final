<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoCollection extends Model
{
    use HasFactory;

    protected $table = 'photoapp_photocollectiions';

    protected $fillable = [
        'name',
        'photo_cat',
        'update_file',
        'date_photo',
        'content',
        'seo_description',
        'seo_keywords',
        'seo_title',
    ];


}
