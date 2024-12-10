<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallBack extends Model
{
    use HasFactory;

    protected $table = 'userapp_collback';

    protected $fillable = [
        'name',
        'company_name',
        'phone',
        'email',
        'content',
        'answer',
        'user_id',
    ];
    public $timestamps = false;
}
