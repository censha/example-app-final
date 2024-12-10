<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authorsapp_authors';

    protected $fillable = [
        'name',
        'content',
        'last_name',
        'photo',
        'oll_job',
        'mesto',
        'ganr',
        'carier',
        'bethday',
        'best_job',
        'prof',
    ];
}
