<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialmedia extends Model
{
    use HasFactory;

    protected $table = 'socialmedia';

    protected $fillable = [
        'facebook',
        'instagram',
        'wa',
        'tiktok',
        'maps',
        'address',
    ];
}
