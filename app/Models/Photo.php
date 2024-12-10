<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photoapp_photo';

    protected $fillable = [
        'name',
        'photo',
        'photo_orig',
        'update_file',
        'date_photo',
        'loc_photo',
        'author_hoto_id',
        'photo_collections_id',
    ];



}
