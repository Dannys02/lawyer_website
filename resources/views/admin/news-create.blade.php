@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Tambah Berita &amp; Liputan Media</h1>
                    <p class="text-xs text-slate-600">Publikasikan tautan warta pers atau liputan kegiatan hukum baru</p>
                </div>
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Judul Berita -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Judul Berita <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                            placeholder="Masukkan judul berita..."
                            class="w-full px-4 py-2.5 rounded-xl border @error('title') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('title')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Penerbit -->
                    <div>
                        <label for="publisher" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Nama Penerbit / Media <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" required
                            placeholder="Contoh: Radar Banyuwangi / DetikJatim"
                            class="w-full px-4 py-2.5 rounded-xl border @error('publisher') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('publisher')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Terbit -->
                    <div>
                        <label for="date_publish" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Tanggal Terbit <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="date_publish" name="date_publish" value="{{ old('date_publish', date('Y-m-d')) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('date_publish') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('date_publish')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- URL Berita -->
                <div>
                    <label for="url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        URL / Tautan Berita <span class="text-red-500">*</span>
                    </label>
                    <input type="url" id="url" name="url" value="{{ old('url') }}" required
                        placeholder="https://..."
                        class="w-full px-4 py-2.5 rounded-xl border @error('url') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('url')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Terkait -->
                <div>
                    <label for="picture" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Foto / Gambar Berita
                    </label>
                    <input type="file" id="picture" name="picture" accept="image/*"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('picture') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                    <p class="mt-1 text-[11px] text-slate-500">Format: JPG, PNG, WEBP, SVG (Maks. 2MB).</p>
                    @error('picture')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('news.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
