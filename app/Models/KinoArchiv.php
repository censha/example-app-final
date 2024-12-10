<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinoArchiv extends Model
{
    use HasFactory;

    protected $table = 'videosapp_category';

    protected $fillable =[
        'name',
        'photo'
    ];


}
