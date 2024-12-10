<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'ordersapp_orderphoto';

    protected $fillable = [
        'answer',
        'bayer_email',
        'bayer_name',
        'bayer_phone',
        'photo_id',
        'photocollectiion_id',
        'user_id',
    ];



}
