<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeraturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $latarBelakang = '<p>Pemberlakuan Kitab Undang-Undang Hukum Pidana (KUHP) Nasional baru melalui Undang-Undang Nomor 1 Tahun 2023 menuntut adanya penyesuaian menyeluruh dan harmonisasi sistem peradilan pidana nasional. Berbagai peraturan perundang-undangan sektoral di luar KUHP serta Peraturan Daerah sebelumnya masih memuat ancaman sanksi pidana dan nominal pidana denda yang belum selaras dengan prinsip pemidanaan modern dan pedoman Buku Kesatu KUHP Nasional.</p><p>Untuk mencegah timbulnya kekosongan hukum, disparitas putusan pidana, serta tumpang tindih norma hukum pidana materiil, Undang-Undang ini dibentuk sebagai pelaksanaan mandat Pasal 613 Undang-Undang Nomor 1 Tahun 2023 guna menyesuaikan ketentuan pidana di luar KUHP secara terintegrasi dan berkepastian hukum.</p>';

        $materiPokok = '<p>Materi pokok pengaturan dalam Undang-Undang Nomor 1 Tahun 2026 meliputi:</p><ul><li><strong>Penyesuaian Sistem Pidana Denda:</strong> Menyelaraskan seluruh ketentuan ancaman pidana denda dalam undang-undang sektoral ke dalam 8 (delapan) Kategori Denda sebagaimana diatur dalam Buku Kesatu KUHP Nasional (UU No. 1 Tahun 2023).</li><li><strong>Harmonisasi Sanksi Pidana Peraturan Daerah:</strong> Membatasi dan menstandarisasi ancaman sanksi pidana dalam Peraturan Daerah (Perda) Provinsi maupun Kabupaten/Kota paling banyak pidana denda Kategori II atau sesuai koridor kewenangan sanksi pelanggaran ringan daerah.</li><li><strong>Penyelarasan Pidana Minimum Khusus dan Pidana Pengganti:</strong> Melakukan restrukturisasi terhadap ancaman pidana minimum khusus serta penghapusan pidana kurungan pengganti yang tidak lagi relevan dengan paradigma keadilan restoratif dan rehabilitatif.</li><li><strong>Koreksi dan Sinkronisasi Teknis KUHP:</strong> Melakukan penyempurnaan redaksional serta klarifikasi normatif atas pasal-pasal tertentu dalam UU No. 1 Tahun 2023 agar implementasi penegakan hukum pidana berjalan efektif dan konsisten.</li></ul>';

        $ketentuanPeralihanPenutup = '<p><strong>Ketentuan Peralihan:</strong></p><p>Pada saat Undang-Undang ini mulai berlaku, terhadap tindak pidana yang perbuatannya dilakukan sebelum berlakunya Undang-Undang ini dan belum berkekuatan hukum tetap (inkracht), diberlakukan ketentuan perundang-undangan yang paling menguntungkan bagi pelaku tindak pidana sesuai dengan asas transitoir hukum pidana.</p><p>Ketentuan pidana dalam undang-undang sektoral maupun peraturan daerah yang belum tercantum secara eksplisit dalam lampiran undang-undang ini wajib ditafsirkan dan disesuaikan pelaksanaannya merujuk pada pedoman Buku Kesatu UU Nomor 1 Tahun 2023.</p><p><strong>Ketentuan Penutup:</strong></p><p>Undang-Undang Nomor 1 Tahun 2026 tentang Penyesuaian Pidana mulai berlaku pada tanggal diundangkan, yaitu 2 Januari 2026, dan diumumkan dalam Lembaran Negara Republik Indonesia.</p>';

        DB::table('peraturan')->updateOrInsert(
            [
                'jenis_peraturan' => 'Undang-Undang',
                'nomor' => '1',
                'tahun' => 2026,
            ],
            [
                'tentang' => 'Penyesuaian Pidana',
                'tanggal_pengundangan' => '2026-01-02',
                'status' => 'Berlaku',
                'latar_belakang' => $latarBelakang,
                'materi_pokok' => $materiPokok,
                'ketentuan_peralihan_penutup' => $ketentuanPeralihanPenutup,
                'file_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
