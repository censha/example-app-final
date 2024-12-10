<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'fileapp_storages';

    protected $fillable = [
        'name',
        'server',
        'prefix',
    ];
}
