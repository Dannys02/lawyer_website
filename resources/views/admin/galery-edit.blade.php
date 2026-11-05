@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Foto Galeri</h1>
                    <p class="text-xs text-slate-600">Perbarui keterangan atau gambar dokumentasi kegiatan</p>
                </div>
                <a href="{{ route('galery.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('galery.update', $galery->id) }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @method('PUT')
                @csrf

                <!-- Nama Dokumentasi -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Dokumentasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $galery->name) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('name')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Foto -->
                <div>
                    <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Gambar Dokumentasi
                    </label>
                    @if ($galery->image)
                        <div class="mb-2.5 flex items-center gap-3">
                            <img src="{{ asset('storage/' . $galery->image) }}" alt="Gambar {{ $galery->name }}"
                                class="w-24 h-24 rounded-xl border border-slate-200 object-cover shadow-sm">
                            <span class="text-xs text-slate-500">Biarkan kosong jika tidak ingin mengganti foto.</span>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('image') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                    @error('image')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('galery.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Perbarui Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
