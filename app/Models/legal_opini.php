<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class legal_opini extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'title', 'slug', 'author', 'text', 'date_publish', 'picture', 'views'
    ];
}
