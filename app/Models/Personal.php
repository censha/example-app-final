<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'userapp_passwordresets';

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
