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
        Schema::table('abouts', function (Blueprint $table) {
            // 1. Hero Banner & Slogan Beranda
            $table->string('hero_tagline')->nullable()->after('image');
            $table->string('hero_title')->nullable()->after('hero_tagline');
            $table->string('hero_slogan')->nullable()->after('hero_title');
            $table->text('hero_description')->nullable()->after('hero_slogan');

            // 2. Visi, Misi & Nilai Fundamental
            $table->string('visi_title')->nullable()->after('hero_description');
            $table->text('visi_text')->nullable()->after('visi_title');
            $table->text('misi_text')->nullable()->after('visi_text');
            $table->text('values_json')->nullable()->after('misi_text');

            // 3. Alasan Memilih Kami & Segmentasi Klien
            $table->text('reasons_json')->nullable()->after('values_json');
            $table->text('segmentations_json')->nullable()->after('reasons_json');
        });

        // Isi default data dari teks yang sebelumnya statis agar tampilan tetap lengkap dan rapi
        $defaultValues = [
            ['title' => 'Integritas', 'desc' => 'Menjaga kejujuran dan keterbukaan sebagai fondasi tak tergoyahkan dalam setiap tindakan hukum yang kami ambil.'],
            ['title' => 'Keberanian', 'desc' => 'Bertindak tegas, gigih, dan pantang menyerah dalam membela kepentingan klien, tanpa kompromi terhadap tegaknya keadilan.'],
            ['title' => 'Profesionalisme', 'desc' => 'Berpegang teguh pada kode etik profesi advokat, kompetensi yuridis teruji, dan ketelitian tinggi dalam setiap dokumen serta persidangan.'],
            ['title' => 'Inovasi', 'desc' => 'Mengintegrasikan pendekatan hukum modern berbasis riset dengan strategi kontemporer yang relevan dengan dinamika era digital.'],
            ['title' => 'Kepedulian', 'desc' => 'Memahami bahwa hukum harus berpihak kepada kebenaran dan mereka yang membutuhkan. Kami senantiasa menghadirkan empati serta kehangatan kemanusiaan dalam setiap pendampingan hukum.'],
        ];

        $defaultReasons = [
            ['title' => 'Pendampingan Tajam, Solutif & Strategis', 'desc' => 'Merumuskan konstruksi hukum yang tepat sasaran sesuai duduk perkara.'],
            ['title' => 'Tim Profesional Berdedikasi Tinggi', 'desc' => 'Dukungan advokat dan konsultan yang kompeten di bidangnya.'],
            ['title' => 'Transparansi Biaya & Progres Perkara', 'desc' => 'Laporan perkembangan penanganan perkara disampaikan secara berkala.'],
            ['title' => 'Pendekatan Humanis pada Perkara Keluarga & Waris', 'desc' => 'Mengutamakan martabat dan ketenangan para pihak dalam sengketa sensitif.'],
            ['title' => 'Penguatan Kesadaran Hukum Masyarakat', 'desc' => 'Aktif memberikan edukasi hukum publik yang mencerdaskan.'],
        ];

        $defaultSegmentations = [
            'Perorangan dan Keluarga',
            'UMKM & Bisnis Rintisan',
            'Perusahaan Swasta & Korporasi',
            'Instansi Pemerintah & BUMDes',
            'Lembaga Pendidikan, Yayasan, & Organisasi Sosial',
        ];

        $defaultVisiText = 'Menjadi kantor hukum yang unggul dan terpercaya secara nasional, dengan reputasi sebagai pelindung hak-hak hukum yang tangguh, profesional, dan progresif.';
        $defaultMisiText = "1. Menyediakan layanan hukum yang berstandar tinggi, responsif, dan berorientasi solusi.\n2. Menjaga marwah profesi advokat melalui integritas, objektivitas, dan keteladanan.\n3. Mendorong terciptanya kepastian dan keadilan hukum bagi setiap klien.\n4. Memberikan edukasi hukum yang membumi, mencerdaskan, dan membebaskan.\n5. Membangun kemitraan jangka panjang dengan entitas bisnis dan institusi negara.";

        DB::table('abouts')->update([
            'hero_tagline' => 'ADVOKAT · MEDIATOR · KONSULTAN HUKUM',
            'hero_title' => 'NURUL SAFII, S.H., M.H., C.MSP & PARTNERS',
            'hero_slogan' => 'Solusi Hukum Terpercaya, Solusi Tepat Untuk Anda',
            'hero_description' => 'Mendampingi klien perorangan, korporasi, dan institusi dalam menghadapi kompleksitas hukum melalui analisis tajam, strategi litigasi maupun non-litigasi yang terukur, serta integritas profesi yang bermartabat.',
            'visi_title' => 'Garda Terdepan Penegakan Hukum Nasional',
            'visi_text' => $defaultVisiText,
            'misi_text' => $defaultMisiText,
            'values_json' => json_encode($defaultValues),
            'reasons_json' => json_encode($defaultReasons),
            'segmentations_json' => json_encode($defaultSegmentations),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
