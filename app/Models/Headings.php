<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headings extends Model
{
    use HasFactory;

    protected $table = 'newsapp_newscateories';

    protected $fillable =[
        'name'
    ];
}
