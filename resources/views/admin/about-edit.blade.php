@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Data Profil, Visi-Misi &amp; Konten Website</h1>
                    <p class="text-xs text-slate-600">Perbarui profil firma, hero banner beranda, visi misi, nilai luhur, keunggulan, dan segmentasi klien</p>
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
                    : (json_decode($about->values_json ?? '[]', true) ?: []);

                $reasonsList = old('reasons_title') !== null
                    ? array_map(fn($t, $i) => ['title' => $t, 'desc' => old('reasons_desc')[$i] ?? ''], old('reasons_title'), array_keys(old('reasons_title')))
                    : (json_decode($about->reasons_json ?? '[]', true) ?: []);

                $segmentationsList = old('segmentations') !== null
                    ? old('segmentations')
                    : (json_decode($about->segmentations_json ?? '[]', true) ?: []);
            @endphp

            <!-- Form Body -->
            <form method="POST" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-8">
                @csrf
                @method('PUT')

                <!-- SECTION 1: PROFIL KANTOR HUKUM -->
                <div class="space-y-4">
                    <div class="pb-2 border-b border-slate-200 flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                        <i class="ti ti-info-circle text-amber-600 text-base"></i>
                        <span>1. Profil Utama &amp; Foto Pendiri</span>
                    </div>

                    <!-- Gambar (image) -->
                    <div>
                        <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Ganti Foto Profil / Pendiri (Opsional)
                        </label>
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('image') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                        <p class="mt-1 text-[11px] text-slate-500">Biarkan kosong jika tidak ingin mengganti gambar saat ini.</p>
                        @error('image')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror

                        @if ($about->image)
                            <div class="mt-3 flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 w-fit">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="Gambar Profil Saat Ini"
                                    class="w-16 h-16 rounded-lg object-cover border border-slate-200">
                                <span class="text-xs text-slate-600 font-medium">Foto saat ini</span>
                            </div>
                        @endif
                    </div>

                    <!-- Deskripsi About (text_about) -->
                    <div>
                        <label for="text_about" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Deskripsi Lengkap Tentang Kantor Hukum (Profil Firma) <span class="text-red-500">*</span>
                        </label>
                        <textarea id="text_about" name="text_about" rows="7" required
                            class="summernote-editor">{{ old('text_about', $about->text_about) }}</textarea>
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
                                Tagline Atas Banner
                            </label>
                            <input type="text" id="hero_tagline" name="hero_tagline" value="{{ old('hero_tagline', $about->hero_tagline) }}"
                                placeholder="Contoh: ADVOKAT · MEDIATOR · KONSULTAN HUKUM"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        </div>
                        <div>
                            <label for="hero_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Judul Besar Banner
                            </label>
                            <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $about->hero_title) }}"
                                placeholder="Contoh: NURUL SAFII, S.H., M.H., C.MSP & PARTNERS"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        </div>
                    </div>

                    <div>
                        <label for="hero_slogan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Slogan / Kutipan Beranda
                        </label>
                        <input type="text" id="hero_slogan" name="hero_slogan" value="{{ old('hero_slogan', $about->hero_slogan) }}"
                            placeholder="Contoh: Solusi Hukum Terpercaya, Solusi Tepat Untuk Anda"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <div>
                        <label for="hero_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Paragraf Pengantar Beranda
                        </label>
                        <textarea id="hero_description" name="hero_description" rows="3"
                            placeholder="Tuliskan pengantar singkat sambutan pada banner..."
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('hero_description', $about->hero_description) }}</textarea>
                    </div>
                </div>

                <!-- SECTION 3: VISI & MISI -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                        <i class="ti ti-target text-amber-600 text-base"></i>
                        <span>3. Visi &amp; Misi Kantor Hukum</span>
                    </div>

                    <div>
                        <label for="visi_title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Judul / Tema Visi
                        </label>
                        <input type="text" id="visi_title" name="visi_title" value="{{ old('visi_title', $about->visi_title) }}"
                            placeholder="Contoh: Garda Terdepan Penegakan Hukum Nasional"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <div>
                        <label for="visi_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Pernyataan Visi Kami
                        </label>
                        <textarea id="visi_text" name="visi_text" rows="3"
                            placeholder="Menjadi kantor hukum yang unggul..."
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('visi_text', $about->visi_text) }}</textarea>
                    </div>

                    <div>
                        <label for="misi_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Misi Pelayanan (Tulis per baris / nomor)
                        </label>
                        <textarea id="misi_text" name="misi_text" rows="5"
                            placeholder="1. Menyediakan layanan hukum...&#10;2. Menjaga marwah profesi..."
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('misi_text', $about->misi_text) }}</textarea>
                        <p class="text-[11px] text-slate-500 mt-1">Setiap baris kalimat baru otomatis dijadikan poin nomor misi di website.</p>
                    </div>
                </div>

                <!-- SECTION 4: NILAI FUNDAMENTAL KANTOR -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="pb-2 border-b border-slate-200 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm uppercase tracking-wider">
                            <i class="ti ti-shield text-amber-600 text-base"></i>
                            <span>4. Nilai-Nilai Fundamental (Pilar Filosofis)</span>
                        </div>
                        <button type="button" onclick="addValueRow()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-300 text-amber-900 hover:bg-amber-100 text-xs font-bold transition">
                            <i class="ti ti-plus"></i> Tambah Nilai
                        </button>
                    </div>

                    <div id="values-wrapper" class="space-y-3">
                        @foreach ($valuesList as $val)
                            <div class="value-item grid grid-cols-1 md:grid-cols-12 gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 items-start">
                                <div class="md:col-span-4">
                                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Nama Nilai</label>
                                    <input type="text" name="values_title[]" value="{{ $val['title'] ?? '' }}" placeholder="Misal: Integritas"
                                        class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
                                </div>
                                <div class="md:col-span-7">
                                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Keterangan / Makna Nilai</label>
                                    <input type="text" name="values_desc[]" value="{{ $val['desc'] ?? '' }}" placeholder="Keterangan singkat nilai..."
                                        class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
                                </div>
                                <div class="md:col-span-1 pt-5 text-center">
                                    <button type="button" onclick="this.closest('.value-item').remove()" class="text-red-600 hover:text-red-800 p-1">
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
                            <i class="ti ti-check text-amber-600 text-base"></i>
                            <span>5. Alasan Memilih Kami (Keunggulan Layanan)</span>
                        </div>
                        <button type="button" onclick="addReasonRow()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-300 text-amber-900 hover:bg-amber-100 text-xs font-bold transition">
                            <i class="ti ti-plus"></i> Tambah Keunggulan
                        </button>
                    </div>

                    <div id="reasons-wrapper" class="space-y-3">
                        @foreach ($reasonsList as $r)
                            <div class="reason-item grid grid-cols-1 md:grid-cols-12 gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 items-start">
                                <div class="md:col-span-4">
                                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Judul Keunggulan</label>
                                    <input type="text" name="reasons_title[]" value="{{ $r['title'] ?? '' }}" placeholder="Misal: Transparansi Biaya"
                                        class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
                                </div>
                                <div class="md:col-span-7">
                                    <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Penjelasan Singkat</label>
                                    <input type="text" name="reasons_desc[]" value="{{ $r['desc'] ?? '' }}" placeholder="Penjelasan keunggulan..."
                                        class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
                                </div>
                                <div class="md:col-span-1 pt-5 text-center">
                                    <button type="button" onclick="this.closest('.reason-item').remove()" class="text-red-600 hover:text-red-800 p-1">
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
                            <i class="ti ti-users text-amber-600 text-base"></i>
                            <span>6. Kategori Segmentasi Klien</span>
                        </div>
                        <button type="button" onclick="addSegmentationRow()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-300 text-amber-900 hover:bg-amber-100 text-xs font-bold transition">
                            <i class="ti ti-plus"></i> Tambah Kategori
                        </button>
                    </div>

                    <div id="segmentations-wrapper" class="space-y-2.5">
                        @foreach ($segmentationsList as $seg)
                            <div class="seg-item flex items-center gap-3">
                                <span class="w-7 h-7 rounded-lg bg-amber-100 text-amber-900 text-xs font-bold flex items-center justify-center shrink-0">
                                    <i class="ti ti-tag"></i>
                                </span>
                                <input type="text" name="segmentations[]" value="{{ $seg }}" placeholder="Misal: Perorangan dan Keluarga"
                                    class="flex-1 px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
                                <button type="button" onclick="this.closest('.seg-item').remove()" class="text-red-600 hover:text-red-800 p-1">
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
                        Simpan &amp; Perbarui Seluruh Konten
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.layouts.summernote')

@push('scripts')
<script>
    function addValueRow() {
        const wrapper = document.getElementById('values-wrapper');
        const div = document.createElement('div');
        div.className = 'value-item grid grid-cols-1 md:grid-cols-12 gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 items-start';
        div.innerHTML = `
            <div class="md:col-span-4">
                <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Nama Nilai</label>
                <input type="text" name="values_title[]" placeholder="Misal: Keadilan"
                    class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
            </div>
            <div class="md:col-span-7">
                <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Keterangan / Makna Nilai</label>
                <input type="text" name="values_desc[]" placeholder="Keterangan singkat nilai..."
                    class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
            </div>
            <div class="md:col-span-1 pt-5 text-center">
                <button type="button" onclick="this.closest('.value-item').remove()" class="text-red-600 hover:text-red-800 p-1">
                    <i class="ti ti-trash text-base"></i>
                </button>
            </div>
        `;
        wrapper.appendChild(div);
    }

    function addReasonRow() {
        const wrapper = document.getElementById('reasons-wrapper');
        const div = document.createElement('div');
        div.className = 'reason-item grid grid-cols-1 md:grid-cols-12 gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 items-start';
        div.innerHTML = `
            <div class="md:col-span-4">
                <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Judul Keunggulan</label>
                <input type="text" name="reasons_title[]" placeholder="Misal: Keunggulan Layanan"
                    class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
            </div>
            <div class="md:col-span-7">
                <label class="block text-[11px] font-bold uppercase text-slate-500 mb-1">Penjelasan Singkat</label>
                <input type="text" name="reasons_desc[]" placeholder="Penjelasan keunggulan..."
                    class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
            </div>
            <div class="md:col-span-1 pt-5 text-center">
                <button type="button" onclick="this.closest('.reason-item').remove()" class="text-red-600 hover:text-red-800 p-1">
                    <i class="ti ti-trash text-base"></i>
                </button>
            </div>
        `;
        wrapper.appendChild(div);
    }

    function addSegmentationRow() {
        const wrapper = document.getElementById('segmentations-wrapper');
        const div = document.createElement('div');
        div.className = 'seg-item flex items-center gap-3';
        div.innerHTML = `
            <span class="w-7 h-7 rounded-lg bg-amber-100 text-amber-900 text-xs font-bold flex items-center justify-center shrink-0">
                <i class="ti ti-tag"></i>
            </span>
            <input type="text" name="segmentations[]" placeholder="Misal: Kategori Klien Baru"
                class="flex-1 px-3 py-2 rounded-lg border border-slate-300 text-xs bg-white focus:outline-none focus:border-amber-600">
            <button type="button" onclick="this.closest('.seg-item').remove()" class="text-red-600 hover:text-red-800 p-1">
                <i class="ti ti-trash text-base"></i>
            </button>
        `;
        wrapper.appendChild(div);
    }
</script>
@endpush
