@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div
                class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Edit Advokat &amp; Legal Partnership</h1>
                    <p class="text-xs text-slate-600">Perbarui informasi profil advokat atau rekanan</p>
                </div>
                <a href="{{ route('legal_patnership.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('legal_patnership.update', $legal_patnership->id) }}"
                enctype="multipart/form-data" onsubmit="document.getElementById('loading-screen').style.display = 'flex';"
                class="p-6 space-y-5">
                @method('PUT')
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Nama Lengkap &amp; Gelar <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $legal_patnership->name) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('name')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan / Posisi -->
                    <div>
                        <label for="position"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Jabatan / Posisi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="position" name="position"
                            value="{{ old('position', $legal_patnership->position) }}" required
                            class="w-full px-4 py-2.5 rounded-xl border @error('position') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('position')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Foto Profil -->
                <div>
                    <label for="photo" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Foto Profil
                    </label>
                    @if ($legal_patnership->photo)
                        <div class="mb-2.5 flex items-center gap-3">
                            <img src="{{ asset('storage/' . $legal_patnership->photo) }}"
                                alt="Foto {{ $legal_patnership->name }}"
                                class="w-20 h-20 rounded-xl border border-slate-200 object-cover shadow-sm">
                            <span class="text-xs text-slate-500">Biarkan kosong jika tidak ingin mengganti foto.</span>
                        </div>
                    @endif
                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border @error('photo') border-red-500 @else border-slate-300 @enderror rounded-xl p-1.5" />
                    @error('photo')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi (Summernote) -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Profil / Keahlian <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" name="description" rows="8"
                        class="summernote-editor">{{ old('description', $legal_patnership->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('legal_patnership.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Perbarui Partnership
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('admin.layouts.summernote')
