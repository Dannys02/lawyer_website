<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'text_about',
        'image',
        'hero_tagline',
        'hero_title',
        'hero_slogan',
        'hero_description',
        'visi_title',
        'visi_text',
        'misi_text',
        'values_json',
        'reasons_json',
        'segmentations_json',
    ];
}
