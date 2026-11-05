<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class segmentation extends Model
{
    use HasFactory;

    protected $table = 'segmentations';

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'picture1', 'picture2', 'picture3', 'picture4'
    ];
}
