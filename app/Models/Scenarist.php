<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenarist extends Model
{
    use HasFactory;    

    protected $table = 'ordersapp_order';

    protected $fillable = [
        
        'answer',
        'film_id',
        'photo_id',
        'photocollectiion_id',
        'user_id',
        'end_segment',
        'start_segment',
    ];
}
