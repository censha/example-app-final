<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'videosapp_video';

    protected $fillable = [
        'banner',
        'video_name',
        'video',
        'shifr',
        'orig_lang',
        'orig_name',
        'alt_name',
        'lat_trans_name',
        'seria',
        'num_in_seria',
        'variant',
        'year_movie',
        'licens',
        'date_release',
        'studia',
        'rolling_company',
        'made_in',
        'type_movie',
        'type_material_movie',
        'genre_movie',
        'age_limit',
        'orig_metr',
        'hrono_metr',
        'annotation',
        'how_parts',
        'how_series',
        'copyright_holder',
        'sound',
        'chroma',
        'status',
        'banner_file_id',
        'collections_id',
        'tems_id',
        'video_file_id',
        'dop_material',
        'videosapp_video',
        'prizes',
        'source',
        'is_digit',
        'quality',
        'types_id',
        'created_at',
        'arch_format',
        'original_spout',
        'seo_description',
        'seo_keywords',
        'seo_title',
        'studia_id_id',
    ];
}
