@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Data About</h1>
                    <p class="text-xs text-slate-600">Perbarui informasi profil dan gambar tentang kantor hukum</p>
                </div>
                <a href="{{ route('abouts.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <!-- Gambar (image) -->
                <div>
                    <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Ganti Gambar (Opsional)
                    </label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('image') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                    <p class="mt-1 text-[11px] text-slate-500">Biarkan kosong jika tidak ingin mengganti gambar saat ini.</p>
                    @error('image')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror

                    @if ($about->image)
                        <div class="mt-3 flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200 w-fit">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="Gambar About Saat Ini"
                                class="w-16 h-16 rounded-lg object-cover border border-slate-200">
                            <span class="text-xs text-slate-600 font-medium">Gambar saat ini</span>
                        </div>
                    @endif
                </div>

                <!-- Deskripsi About (text_about) -->
                <div>
                    <label for="text_about" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Tentang Kami (text_about) <span class="text-red-500">*</span>
                    </label>
                    <textarea id="text_about" name="text_about" rows="8" required
                        class="summernote-editor">{{ old('text_about', $about->text_about) }}</textarea>
                    @error('text_about')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('abouts.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.layouts.summernote')
