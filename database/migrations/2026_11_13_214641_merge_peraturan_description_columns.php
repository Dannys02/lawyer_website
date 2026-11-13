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
        // 1. Tambah kolom deskripsi setelah status
        Schema::table('peraturan', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('status');
        });

        // 2. Gabungkan data dari latar_belakang, materi_pokok, dan ketentuan_peralihan_penutup ke deskripsi
        $rows = DB::table('peraturan')->get();
        foreach ($rows as $row) {
            $parts = [];

            if (!empty($row->latar_belakang)) {
                $parts[] = '<div class="mb-4"><strong>Latar Belakang:</strong><br>' . $row->latar_belakang . '</div>';
            }

            if (!empty($row->materi_pokok)) {
                $parts[] = '<div class="mb-4"><strong>Materi Pokok:</strong><br>' . $row->materi_pokok . '</div>';
            }

            if (!empty($row->ketentuan_peralihan_penutup)) {
                $parts[] = '<div class="mb-4"><strong>Ketentuan Peralihan &amp; Penutup:</strong><br>' . $row->ketentuan_peralihan_penutup . '</div>';
            }

            $mergedDescription = !empty($parts) ? implode("\n", $parts) : null;

            DB::table('peraturan')->where('id', $row->id)->update([
                'deskripsi' => $mergedDescription,
            ]);
        }

        // 3. Drop kolom-kolom lama
        Schema::table('peraturan', function (Blueprint $table) {
            $table->dropColumn(['latar_belakang', 'materi_pokok', 'ketentuan_peralihan_penutup']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peraturan', function (Blueprint $table) {
            $table->text('latar_belakang')->nullable()->after('status');
            $table->text('materi_pokok')->nullable()->after('latar_belakang');
            $table->text('ketentuan_peralihan_penutup')->nullable()->after('materi_pokok');
        });

        DB::table('peraturan')->update([
            'materi_pokok' => DB::raw('deskripsi'),
        ]);

        Schema::table('peraturan', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
};
