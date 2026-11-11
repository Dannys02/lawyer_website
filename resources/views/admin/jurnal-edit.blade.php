@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div
                class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Kumpulan Undang-Undang</h1>
                    <p class="text-xs text-slate-600">Perbarui berkas peraturan perundang-undangan atau deskripsi dokumen</p>
                </div>
                <a href="{{ route('jurnal.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('jurnal.update', $jurnal->id) }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @method('PUT')
                @csrf

                <!-- Judul -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Judul Jurnal <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $jurnal->title) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border @error('title') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('title')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Sampul -->
                    <div>
                        <label for="thumbnail"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Sampul Jurnal (Gambar)
                        </label>
                        @if ($jurnal->thumbnail)
                            <div class="mb-2 flex items-center gap-3">
                                <img src="{{ asset('storage/' . $jurnal->thumbnail) }}" alt="Sampul"
                                    class="w-16 h-16 rounded-lg border border-slate-200 object-cover">
                                <span class="text-xs text-slate-500">Biarkan kosong jika tidak ingin mengganti
                                    sampul.</span>
                            </div>
                        @endif
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('thumbnail') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                        @error('thumbnail')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File PDF -->
                    <div>
                        <label for="pdf_file"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Berkas Dokumen PDF
                        </label>
                        @if ($jurnal->pdf_file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $jurnal->pdf_file) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 text-xs font-bold">
                                    <i class="ti ti-file-text"></i> Lihat Berkas PDF Saat Ini
                                </a>
                            </div>
                        @endif
                        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('pdf_file') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                        @error('pdf_file')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi (Summernote) -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi / Abstrak Jurnal
                    </label>
                    <textarea id="description" name="description" rows="8"
                        class="summernote-editor">{{ old('description', $jurnal->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('jurnal.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Perbarui Jurnal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.layouts.summernote')
