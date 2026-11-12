@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div
                class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Peraturan</h1>
                    <p class="text-xs text-slate-600">Perbarui data peraturan perundang-undangan dan dokumen hukum</p>
                </div>
                <a href="{{ route('peraturan.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('peraturan.update', $peraturan->id) }}" enctype="multipart/form-data"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @method('PUT')
                @csrf

                <!-- Jenis Peraturan & Nomor & Tahun -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label for="jenis_peraturan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Jenis Peraturan <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_peraturan" name="jenis_peraturan" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('jenis_peraturan') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 bg-white">
                            @php
                                $currentJenis = old('jenis_peraturan', $peraturan->jenis_peraturan);
                                $jenisOptions = [
                                    'Undang-Undang',
                                    'Peraturan Pemerintah Pengganti Undang-Undang',
                                    'Peraturan Pemerintah',
                                    'Peraturan Presiden',
                                    'Peraturan Daerah Provinsi',
                                    'Peraturan Daerah Kabupaten/Kota',
                                    'Peraturan Menteri',
                                    'Peraturan Mahkamah Agung',
                                    'Peraturan Lainnya',
                                ];
                            @endphp
                            @foreach ($jenisOptions as $opt)
                                <option value="{{ $opt }}" {{ $currentJenis === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>
                        @error('jenis_peraturan')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nomor" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Nomor Peraturan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nomor" name="nomor" value="{{ old('nomor', $peraturan->nomor) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('nomor') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('nomor')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tahun" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Tahun <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="tahun" name="tahun" value="{{ old('tahun', $peraturan->tahun) }}" required min="1945" max="2100"
                            class="w-full px-4 py-2.5 rounded-xl border @error('tahun') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('tahun')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tentang -->
                <div>
                    <label for="tentang" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Tentang (Judul / Hal) <span class="text-red-500">*</span>
                    </label>
                    <textarea id="tentang" name="tentang" rows="2" required
                        class="w-full px-4 py-2.5 rounded-xl border @error('tentang') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('tentang', $peraturan->tentang) }}</textarea>
                    @error('tentang')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Pengundangan, Status, dan File PDF -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label for="tanggal_pengundangan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Tanggal Pengundangan
                        </label>
                        <input type="date" id="tanggal_pengundangan" name="tanggal_pengundangan"
                            value="{{ old('tanggal_pengundangan', optional($peraturan->tanggal_pengundangan)->format('Y-m-d')) }}"
                            class="w-full px-4 py-2.5 rounded-xl border @error('tanggal_pengundangan') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('tanggal_pengundangan')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Status Peraturan <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('status') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20 bg-white">
                            @php
                                $currentStatus = old('status', $peraturan->status);
                            @endphp
                            <option value="Berlaku" {{ $currentStatus === 'Berlaku' ? 'selected' : '' }}>Berlaku</option>
                            <option value="Diubah" {{ $currentStatus === 'Diubah' ? 'selected' : '' }}>Diubah</option>
                            <option value="Dicabut" {{ $currentStatus === 'Dicabut' ? 'selected' : '' }}>Dicabut / Tidak Berlaku</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="file_path" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Berkas Dokumen PDF
                        </label>
                        @if ($peraturan->file_path)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $peraturan->file_path) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 text-xs font-bold">
                                    <i class="ti ti-file-text"></i> Lihat Berkas PDF Saat Ini
                                </a>
                            </div>
                        @endif
                        <input type="file" id="file_path" name="file_path" accept="application/pdf"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('file_path') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                        <span class="text-[11px] text-slate-500 block mt-1">Biarkan kosong jika tidak ingin mengubah berkas PDF.</span>
                        @error('file_path')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Latar Belakang (Summernote) -->
                <div>
                    <label for="latar_belakang" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Latar Belakang / Menimbang
                    </label>
                    <textarea id="latar_belakang" name="latar_belakang" rows="6"
                        class="summernote-editor">{{ old('latar_belakang', $peraturan->latar_belakang) }}</textarea>
                    @error('latar_belakang')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Materi Pokok (Summernote) -->
                <div>
                    <label for="materi_pokok" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Materi Pokok / Pokok Pengaturan
                    </label>
                    <textarea id="materi_pokok" name="materi_pokok" rows="6"
                        class="summernote-editor">{{ old('materi_pokok', $peraturan->materi_pokok) }}</textarea>
                    @error('materi_pokok')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ketentuan Peralihan dan Penutup (Summernote) -->
                <div>
                    <label for="ketentuan_peralihan_penutup" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Ketentuan Peralihan &amp; Penutup
                    </label>
                    <textarea id="ketentuan_peralihan_penutup" name="ketentuan_peralihan_penutup" rows="6"
                        class="summernote-editor">{{ old('ketentuan_peralihan_penutup', $peraturan->ketentuan_peralihan_penutup) }}</textarea>
                    @error('ketentuan_peralihan_penutup')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('peraturan.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Perbarui Peraturan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.layouts.summernote')
