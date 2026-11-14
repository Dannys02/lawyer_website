@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Tambah Data Profil, Visi-Misi &amp; Konten Website</h1>
                    <p class="text-xs text-slate-600">Tambahkan informasi profil firma, hero banner beranda, visi misi, nilai luhur, keunggulan, dan segmentasi klien</p>
                </div>
                <a href="{{ route('abouts.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            @php
                $valuesList = old('values_title') !== null
                    ? array_map(fn($t, $i) => ['title' => $t, 'desc' => old('values_desc')[$i] ?? ''], old('values_title'), array_keys(old('values_title')))
                    : [
                        ['title' => 'Integritas', 'desc' => 'Menjaga kejujuran dan keterbukaan sebagai fondasi tak tergoyahkan dalam setiap tindakan hukum yang kami ambil.'],
                        ['title' => 'Keberanian', 'desc' => 'Bertindak tegas, gigih, dan pantang menyerah dalam membela kepentingan klien, tanpa kompromi terhadap tegaknya keadilan.'],
                        ['title' => 'Profesionalisme', 'desc' => 'Berpegang teguh pada kode etik profesi advokat, kompetensi yuridis teruji, dan ketelitian tinggi dalam setiap dokumen serta persidangan.'],
                        ['title' => 'Inovasi', 'desc' => 'Mengintegrasikan pendekatan hukum modern berbasis riset dengan strategi kontemporer yang relevan dengan dinamika era digital.'],
                        ['title' => 'Kepedulian', 'desc' => 'Memahami bahwa hukum harus berpihak kepada kebenaran dan mereka yang membutuhkan. Kami senantiasa menghadirkan empati serta kehangatan kemanusiaan dalam setiap pendampingan hukum.']
                    ];

                $reasonsList = old('reasons_title') !== null
                    ? array_map(fn($t, $i) => ['title' => $t, 'desc' => old('reasons_desc')[$i] ?? ''], old('reasons_title'), array_keys(old('reasons_title')))
                    : [
                        ['title' => 'Pendampingan Tajam, Solutif & Strategis', 'desc' => 'Merumuskan konstruksi hukum yang tepat sasaran sesuai duduk perkara.'],
                        ['title' => 'Tim Profesional Berdedikasi Tinggi', 'desc' => 'Dukungan advokat dan konsultan yang kompeten di bidangnya.'],
                        ['title' => 'Transparansi Biaya & Progres Perkara', 'desc' => 'Laporan perkembangan penanganan perkara disampaikan secara berkala.'],
                        ['title' => 'Pendekatan Humanis pada Perkara Keluarga & Waris', 'desc' => 'Mengutamakan martabat dan ketenangan para pihak dalam sengketa sensitif.'],
                        ['title' => 'Penguatan Kesadaran Hukum Masyarakat', 'desc' => 'Aktif memberikan edukasi hukum publik yang mencerdaskan.']
                    ];

                $segmentationsList = old('segmentations') !== null
                    ? old('segmentations')
                    : [
                        'Perorangan dan Keluarga',
                        'UMKM & Bisnis Rintisan',
                        'Perusahaan Swasta & Korporasi',
                        'Instansi Pemerintah & BUMDes',
                        'Lembaga Pendidikan, Yayasan, & Organisasi Sosial'
                    ];
            @endphp

            <!-- Form Body -->
            <form method="POST" action="{{ route('abouts.store') }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-8">
                @csrf

                <!-- SECTION 1: PROFIL KANTOR HUKUM -->
                <div class="space-y-4">
                    <div class="pb-2 border-b border-slate-200 flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                        <i class="ti ti-info-circle text-amber-600 text-base"></i>
                        <span>1. Profil Utama &amp; Foto Pendiri</span>
                    </div>

                    <!-- Gambar (image) -->
                    <div>
                        <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Unggah Foto Profil / Pendiri <span class="text-red-500">*</span>
                        </label>
                        <input type="file" id="image" name="image" accept="image/*" required
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('image') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                        <p class="mt-1 text-[11px] text-slate-500">Format: JPG, PNG, GIF, SVG, WEBP (Maks. 2MB).</p>
                        @error('image')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi Profil (text_about) -->
                    <div>
                        <label for="text_about" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Deskripsi Lengkap Tentang Kami (text_about) <span class="text-red-500">*</span>
                        </label>
                        <textarea id="text_about" name="text_about" rows="8" required
                            class="summernote-editor">{{ old('text_about') }}</textarea>
                        @error('text_about')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 2: HERO BANNER BERANDA -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                        <i class="ti ti-layout-navbar text-amber-600 text-base"></i>
                        <span>2. Banner Utama Beranda (Hero Section)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="hero_tagline" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Tagline / Label Kecil Atas
                            </label>
                            <input type="text" id="hero_tagline" name="hero_tagline"
                                value="{{ old('hero_tagline', 'ADVOKAT · MEDIATOR · KONSULTAN HUKUM') }}"
                                placeholder="Contoh: ADVOKAT · MEDIATOR · KONSULTAN HUKUM"
                                class="w-full text-sm border @error('hero_tagline') border-red-500 @else border-slate-300 @enderror rounded-xl p-2.5 focus:border-amber-500 focus:outline-none" />
                            @error('hero_tagline')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hero_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Judul / Nama Kantor
                            </label>
                            <input type="text" id="hero_title" name="hero_title"
                                value="{{ old('hero_title', 'KANTOR HUKUM NURUL SAFII, S.H., M.H., C.MSP & PARTNERS') }}"
                                placeholder="Contoh: KANTOR HUKUM NURUL SAFII, S.H., M.H., C.MSP & PARTNERS"
                                class="w-full text-sm border @error('hero_title') border-red-500 @else border-slate-300 @enderror rounded-xl p-2.5 focus:border-amber-500 focus:outline-none" />
                            @error('hero_title')
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="hero_slogan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Slogan / Kutipan Emas Beranda
                        </label>
                        <input type="text" id="hero_slogan" name="hero_slogan"
                            value="{{ old('hero_slogan', 'Solusi Hukum Terpercaya, Solusi Tepat Untuk Anda') }}"
                            placeholder="Contoh: Solusi Hukum Terpercaya, Solusi Tepat Untuk Anda"
                            class="w-full text-sm border @error('hero_slogan') border-red-500 @else border-slate-300 @enderror rounded-xl p-2.5 focus:border-amber-500 focus:outline-none" />
                        @error('hero_slogan')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="hero_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Paragraf Pengantar Singkat Beranda
                        </label>
                        <textarea id="hero_description" name="hero_description" rows="3"
                            placeholder="Mendampingi klien perorangan, korporasi..."
                            class="w-full text-sm border @error('hero_description') border-red-500 @else border-slate-300 @enderror rounded-xl p-2.5 focus:border-amber-500 focus:outline-none">{{ old('hero_description', 'Mendampingi klien perorangan, korporasi, dan institusi dalam menghadapi kompleksitas hukum melalui analisis tajam, strategi litigasi maupun non-litigasi yang terukur, serta integritas profesi yang bermartabat.') }}</textarea>
                        @error('hero_description')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SECTION 3: VISI & MISI -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                        <i class="ti ti-target text-amber-600 text-base"></i>
                        <span>3. Visi &amp; Misi Kantor Hukum</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div>
                                <label for="visi_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Judul Visi
                                </label>
                                <input type="text" id="visi_title" name="visi_title"
                                    value="{{ old('visi_title', 'Garda Terdepan Penegakan Hukum Nasional') }}"
                                    class="w-full text-sm border border-slate-300 rounded-xl p-2.5 focus:border-amber-500 focus:outline-none" />
                            </div>

                            <div>
                                <label for="visi_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                    Pernyataan Visi Kami
                                </label>
                                <textarea id="visi_text" name="visi_text" rows="5"
                                    placeholder="Tuliskan pernyataan visi..."
                                    class="w-full text-sm border border-slate-300 rounded-xl p-2.5 focus:border-amber-500 focus:outline-none">{{ old('visi_text', 'Menjadi kantor hukum yang unggul dan terpercaya secara nasional, dengan reputasi sebagai pelindung hak-hak hukum yang tangguh, profesional, dan progresif.') }}</textarea>
                            </div>
                        </div>

                        <div>
                            <label for="misi_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Misi Kami (1 Butir Misi per Baris)
                            </label>
                            <textarea id="misi_text" name="misi_text" rows="8"
                                placeholder="Tuliskan misi satu per baris..."
                                class="w-full text-sm border border-slate-300 rounded-xl p-2.5 font-mono text-xs focus:border-amber-500 focus:outline-none">{{ old('misi_text', "Menyediakan layanan hukum yang berstandar tinggi, responsif, dan berorientasi solusi.\nMenjaga marwah profesi advokat melalui integritas, objektivitas, dan keteladanan.\nMendorong terciptanya kepastian dan keadilan hukum bagi setiap klien.\nMemberikan edukasi hukum yang membumi, mencerdaskan, dan membebaskan.\nMembangun kemitraan jangka panjang dengan entitas bisnis dan institusi negara.") }}</textarea>
                            <p class="mt-1 text-[11px] text-slate-500">Tekan enter untuk memisahkan setiap butir misi. Sistem otomatis memberi nomor urut di website.</p>
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: NILAI-NILAI FUNDAMENTAL -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                            <i class="ti ti-star text-amber-600 text-base"></i>
                            <span>4. Nilai-Nilai Fundamental (Pilar Filosofis)</span>
                        </div>
                        <button type="button" id="btn-add-value"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold tracking-wider transition">
                            <i class="ti ti-plus"></i> Tambah Nilai
                        </button>
                    </div>

                    <div id="values-repeater-container" class="space-y-3">
                        @foreach ($valuesList as $val)
                            <div class="value-item bg-slate-50 border border-slate-200 rounded-xl p-3 flex flex-col md:flex-row gap-3 items-start md:items-center">
                                <div class="w-full md:w-1/3">
                                    <input type="text" name="values_title[]" value="{{ $val['title'] ?? '' }}" placeholder="Judul Pilar (e.g. Integritas)"
                                        class="w-full text-xs font-bold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                                </div>
                                <div class="w-full md:w-2/3 flex items-center gap-2">
                                    <input type="text" name="values_desc[]" value="{{ $val['desc'] ?? '' }}" placeholder="Deskripsi ringkas pilar..."
                                        class="w-full text-xs border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                                    <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 transition" title="Hapus baris">
                                        <i class="ti ti-trash text-base"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- SECTION 5: ALASAN MEMILIH KAMI -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                            <i class="ti ti-shield-check text-amber-600 text-base"></i>
                            <span>5. Alasan Memilih Kami (Keunggulan Layanan)</span>
                        </div>
                        <button type="button" id="btn-add-reason"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold tracking-wider transition">
                            <i class="ti ti-plus"></i> Tambah Keunggulan
                        </button>
                    </div>

                    <div id="reasons-repeater-container" class="space-y-3">
                        @foreach ($reasonsList as $rea)
                            <div class="reason-item bg-slate-50 border border-slate-200 rounded-xl p-3 flex flex-col md:flex-row gap-3 items-start md:items-center">
                                <div class="w-full md:w-1/3">
                                    <input type="text" name="reasons_title[]" value="{{ $rea['title'] ?? '' }}" placeholder="Judul Keunggulan"
                                        class="w-full text-xs font-bold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                                </div>
                                <div class="w-full md:w-2/3 flex items-center gap-2">
                                    <input type="text" name="reasons_desc[]" value="{{ $rea['desc'] ?? '' }}" placeholder="Deskripsi keunggulan..."
                                        class="w-full text-xs border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                                    <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 transition" title="Hapus baris">
                                        <i class="ti ti-trash text-base"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- SECTION 6: SEGMENTASI KLIEN -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                            <i class="ti ti-users-group text-amber-600 text-base"></i>
                            <span>6. Kategori Segmentasi Klien</span>
                        </div>
                        <button type="button" id="btn-add-segmentation"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold tracking-wider transition">
                            <i class="ti ti-plus"></i> Tambah Kategori
                        </button>
                    </div>

                    <div id="segmentations-repeater-container" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($segmentationsList as $seg)
                            <div class="segmentation-item bg-slate-50 border border-slate-200 rounded-xl p-2.5 flex items-center gap-2">
                                <span class="text-xs font-bold text-amber-600 px-2 py-1 bg-amber-50 rounded">Tag</span>
                                <input type="text" name="segmentations[]" value="{{ is_array($seg) ? ($seg['title'] ?? '') : $seg }}" placeholder="Nama Segmentasi (misal: Perorangan)"
                                    class="w-full text-xs font-semibold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                                <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1 rounded hover:bg-red-50 transition" title="Hapus">
                                    <i class="ti ti-trash text-base"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="pt-6 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('abouts.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT REPEATER DINAMIS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Helper remove row
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.btn-remove-row');
                if (btn) {
                    const row = btn.closest('.value-item, .reason-item, .segmentation-item');
                    if (row) {
                        row.remove();
                    }
                }
            });

            // 1. Tambah Nilai Fundamental
            const btnAddValue = document.getElementById('btn-add-value');
            const valuesContainer = document.getElementById('values-repeater-container');
            if (btnAddValue && valuesContainer) {
                btnAddValue.addEventListener('click', function () {
                    const item = document.createElement('div');
                    item.className = 'value-item bg-slate-50 border border-slate-200 rounded-xl p-3 flex flex-col md:flex-row gap-3 items-start md:items-center';
                    item.innerHTML = `
                        <div class="w-full md:w-1/3">
                            <input type="text" name="values_title[]" placeholder="Judul Pilar"
                                class="w-full text-xs font-bold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                        </div>
                        <div class="w-full md:w-2/3 flex items-center gap-2">
                            <input type="text" name="values_desc[]" placeholder="Deskripsi ringkas pilar..."
                                class="w-full text-xs border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                            <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 transition" title="Hapus baris">
                                <i class="ti ti-trash text-base"></i>
                            </button>
                        </div>
                    `;
                    valuesContainer.appendChild(item);
                });
            }

            // 2. Tambah Alasan Memilih Kami
            const btnAddReason = document.getElementById('btn-add-reason');
            const reasonsContainer = document.getElementById('reasons-repeater-container');
            if (btnAddReason && reasonsContainer) {
                btnAddReason.addEventListener('click', function () {
                    const item = document.createElement('div');
                    item.className = 'reason-item bg-slate-50 border border-slate-200 rounded-xl p-3 flex flex-col md:flex-row gap-3 items-start md:items-center';
                    item.innerHTML = `
                        <div class="w-full md:w-1/3">
                            <input type="text" name="reasons_title[]" placeholder="Judul Keunggulan"
                                class="w-full text-xs font-bold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                        </div>
                        <div class="w-full md:w-2/3 flex items-center gap-2">
                            <input type="text" name="reasons_desc[]" placeholder="Deskripsi keunggulan..."
                                class="w-full text-xs border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                            <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1.5 rounded hover:bg-red-50 transition" title="Hapus baris">
                                <i class="ti ti-trash text-base"></i>
                            </button>
                        </div>
                    `;
                    reasonsContainer.appendChild(item);
                });
            }

            // 3. Tambah Segmentasi Klien
            const btnAddSegmentation = document.getElementById('btn-add-segmentation');
            const segContainer = document.getElementById('segmentations-repeater-container');
            if (btnAddSegmentation && segContainer) {
                btnAddSegmentation.addEventListener('click', function () {
                    const item = document.createElement('div');
                    item.className = 'segmentation-item bg-slate-50 border border-slate-200 rounded-xl p-2.5 flex items-center gap-2';
                    item.innerHTML = `
                        <span class="text-xs font-bold text-amber-600 px-2 py-1 bg-amber-50 rounded">Tag</span>
                        <input type="text" name="segmentations[]" placeholder="Nama Segmentasi"
                            class="w-full text-xs font-semibold border border-slate-300 rounded-lg p-2 focus:border-amber-500 focus:outline-none" required />
                        <button type="button" class="btn-remove-row text-red-500 hover:text-red-700 p-1 rounded hover:bg-red-50 transition" title="Hapus">
                            <i class="ti ti-trash text-base"></i>
                        </button>
                    `;
                    segContainer.appendChild(item);
                });
            }
        });
    </script>
@endsection

@include('admin.layouts.summernote')
