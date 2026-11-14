<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class legal_patnership extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'position',
        'description',
    ];
    protected $guarded = ['id'];
}
