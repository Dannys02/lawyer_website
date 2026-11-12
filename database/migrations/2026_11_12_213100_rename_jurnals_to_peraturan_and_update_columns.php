<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Rename tabel 'jurnals' menjadi 'peraturan'
        Schema::rename('jurnals', 'peraturan');

        // 2. Tambah kolom baru yang dibutuhkan
        Schema::table('peraturan', function (Blueprint $table) {
            $table->string('jenis_peraturan')->default('Undang-Undang')->after('id');
            $table->string('nomor')->default('-')->after('jenis_peraturan');
            $table->year('tahun')->default(2026)->after('nomor');
            $table->string('tentang')->nullable()->after('tahun');
            $table->date('tanggal_pengundangan')->nullable()->after('tentang');
            $table->string('status')->default('Berlaku')->after('tanggal_pengundangan');
            $table->text('latar_belakang')->nullable()->after('status');
            $table->text('materi_pokok')->nullable()->after('latar_belakang');
            $table->text('ketentuan_peralihan_penutup')->nullable()->after('materi_pokok');
            $table->string('file_path')->nullable()->after('ketentuan_peralihan_penutup');
        });

        // 3. Migrasikan data lama dari kolom jurnal ke kolom peraturan baru
        DB::table('peraturan')->update([
            'tentang' => DB::raw('title'),
            'file_path' => DB::raw('pdf_file'),
            'materi_pokok' => DB::raw('description'),
        ]);

        // Jadikan kolom 'tentang' NOT NULL setelah data disalin
        Schema::table('peraturan', function (Blueprint $table) {
            $table->string('tentang')->nullable(false)->change();
        });

        // 4. Hapus kolom-kolom lama yang tidak lagi digunakan dalam spesifikasi baru
        Schema::table('peraturan', function (Blueprint $table) {
            $table->dropColumn(['title', 'pdf_file', 'thumbnail', 'description', 'views']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Kembalikan kolom-kolom lama
        Schema::table('peraturan', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('pdf_file')->nullable()->after('title');
            $table->string('thumbnail')->nullable()->after('pdf_file');
            $table->text('description')->nullable()->after('thumbnail');
            $table->unsignedBigInteger('views')->default(0)->after('description');
        });

        // Kembalikan data dari kolom peraturan ke kolom lama
        DB::table('peraturan')->update([
            'title' => DB::raw('tentang'),
            'pdf_file' => DB::raw('file_path'),
            'description' => DB::raw('materi_pokok'),
            'thumbnail' => 'jurnal/thumbnails/default.png',
        ]);

        Schema::table('peraturan', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->string('pdf_file')->nullable(false)->change();
            $table->string('thumbnail')->nullable(false)->change();
        });

        // 2. Drop kolom-kolom baru
        Schema::table('peraturan', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });

        // 3. Rename tabel kembali ke 'jurnals'
        Schema::rename('peraturan', 'jurnals');
    }
};
