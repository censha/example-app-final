<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regeser extends Model
{
    use HasFactory;

    protected $table = 'fileapp_segmentfilm';

    protected $fillable = [
        'start_segment',
        'end_segment',
        'segment_path',
    ];

    protected $primaryKey = 'filevideo_ptr_id';
    public $timestamps = false;
    public $incrementing = true;
}
