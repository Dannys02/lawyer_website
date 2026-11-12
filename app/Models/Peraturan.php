<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;

    protected $table = 'peraturan';

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'jenis_peraturan',
        'nomor',
        'tahun',
        'tentang',
        'tanggal_pengundangan',
        'status',
        'latar_belakang',
        'materi_pokok',
        'ketentuan_peralihan_penutup',
        'file_path',
        'views',
    ];

    protected $casts = [
        'tanggal_pengundangan' => 'date',
        'tahun' => 'integer',
    ];
}
