<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeuser extends Model
{
    use HasFactory;

    protected $table = 'ordersapp_typeused';

    protected $fillable = [
        'name',
    ];
}
