<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $table = 'postersapp_poster';

    protected $fillable = [
        'name',
        'photo',
        'film',
        'date_photo',
        'loc_photo',
        'tirage',
        'sizes',
        'photo_collections_id',
    ];
}
