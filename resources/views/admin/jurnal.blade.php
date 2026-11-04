@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <!-- Main Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Manajemen Jurnal Hukum</h1>
                    <p class="text-xs text-slate-600">Kelola berkas publikasi riset dan jurnal ilmiah hukum</p>
                </div>
                <button type="button" onclick="openAdminModal('tambahJurnal')"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer self-start sm:self-auto">
                    <i class="ti ti-plus text-sm"></i>
                    <span>Tambah Jurnal</span>
                </button>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                            <th class="py-3.5 pl-6 pr-4">Judul Jurnal</th>
                            <th class="py-3.5 px-4">Sampul</th>
                            <th class="py-3.5 px-4">Berkas PDF</th>
                            <th class="py-3.5 px-4">Deskripsi Ringkas</th>
                            <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($jurnals as $row)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 pl-6 pr-4">
                                    <div class="font-semibold text-slate-900 truncate max-w-xs sm:max-w-md" title="{{ $row->title }}">
                                        {{ $row->title }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="Sampul {{ $row->title }}"
                                        class="w-14 h-14 rounded-lg border border-slate-200 object-cover">
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <a href="{{ asset('storage/' . $row->pdf_file) }}" target="_blank"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 hover:bg-amber-100 text-xs font-bold transition">
                                        <i class="ti ti-file-text text-sm text-amber-700"></i>
                                        <span>Lihat PDF</span>
                                    </a>
                                </td>
                                <td class="py-4 px-4 max-w-sm">
                                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed line-clamp-2">
                                        {{ Str::limit($row->description, 180) }}
                                    </p>
                                </td>
                                <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                                    <div class="relative inline-block">
                                        <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-jurnal-{{ $row->id }}')"
                                            class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                            <i class="ti ti-dots-vertical text-lg"></i>
                                        </button>
                                        <div id="dropdown-jurnal-{{ $row->id }}"
                                            class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                            <button type="button" onclick="openAdminModal('editArtikel{{ $row->id }}')"
                                                class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                                <i class="ti ti-pencil text-sm text-amber-700"></i>
                                                <span>Edit</span>
                                            </button>

                                            <form action="{{ route('jurnal.destroy', $row->id) }}" method="POST" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-name="{{ $row->title }}"
                                                    class="btn-delete w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 transition">
                                                    <i class="ti ti-trash text-sm"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2 text-slate-400">
                                        <i class="ti ti-book-off text-4xl"></i>
                                        <span class="text-sm font-medium text-slate-500">Tidak ada Jurnal yang tersedia</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jurnal -->
    <div id="tambahJurnal" aria-hidden="true"
        class="admin-modal-backdrop hidden fixed inset-0 z-50 items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-2xl overflow-hidden my-8">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-900">Tambah Jurnal Hukum</h3>
                <button type="button" onclick="closeAdminModal('tambahJurnal')"
                    class="w-8 h-8 rounded-lg text-slate-500 hover:bg-slate-200 hover:text-slate-900 flex items-center justify-center transition">
                    <i class="ti ti-x text-lg"></i>
                </button>
            </div>

            <form method="POST" action="{{ route('jurnal.store') }}" enctype="multipart/form-data" id="formJurnal"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-4">
                @csrf
                <!-- Judul -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Jurnal</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="w-full px-3.5 py-2.5 rounded-lg border @error('title') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('title')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Sampul -->
                    <div>
                        <label for="thumbnail" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sampul (Gambar)</label>
                        <input type="file" id="thumbnail" name="thumbnail"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                        @error('thumbnail')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File PDF -->
                    <div>
                        <label for="pdf_file" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">File PDF</label>
                        <input type="file" id="pdf_file" name="pdf_file"
                            class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                        @error('pdf_file')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-3.5 py-2.5 rounded-lg border @error('description') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeAdminModal('tambahJurnal')"
                        class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition">
                        Simpan Jurnal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Jurnal -->
    @foreach ($jurnals as $data)
        <div id="editArtikel{{ $data->id }}" aria-hidden="true"
            class="admin-modal-backdrop hidden fixed inset-0 z-50 items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-2xl overflow-hidden my-8">
                <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-900">Edit Jurnal Hukum</h3>
                    <button type="button" onclick="closeAdminModal('editArtikel{{ $data->id }}')"
                        class="w-8 h-8 rounded-lg text-slate-500 hover:bg-slate-200 hover:text-slate-900 flex items-center justify-center transition">
                        <i class="ti ti-x text-lg"></i>
                    </button>
                </div>

                <form method="POST" action="{{ route('jurnal.update', $data->id) }}" enctype="multipart/form-data"
                    onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-4">
                    @method('PUT')
                    @csrf
                    <!-- Judul -->
                    <div>
                        <label for="title_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Jurnal</label>
                        <input type="text" id="title_{{ $data->id }}" name="title" value="{{ old('title', $data->title) }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Sampul -->
                        <div>
                            <label for="thumbnail_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sampul</label>
                            <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="Sampul" class="w-16 h-16 rounded-lg border border-slate-200 object-cover mb-2">
                            <input type="file" id="thumbnail_{{ $data->id }}" name="thumbnail"
                                class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                        </div>

                        <!-- File PDF -->
                        <div>
                            <label for="pdf_file_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">File PDF</label>
                            <a href="{{ asset('storage/' . $data->pdf_file) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 text-xs font-bold mb-2">
                                <i class="ti ti-file-text"></i> Lihat File Saat Ini
                            </a>
                            <input type="file" id="pdf_file_{{ $data->id }}" name="pdf_file"
                                class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi</label>
                        <textarea id="description_{{ $data->id }}" name="description" rows="4"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20">{{ old('description', $data->description) }}</textarea>
                    </div>

                    <!-- Footer Actions -->
                    <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                        <button type="button" onclick="closeAdminModal('editArtikel{{ $data->id }}')"
                            class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition">
                            Perbarui Jurnal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('form');
                    const name = this.getAttribute('data-name');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: `Data "${name}" akan dihapus permanen!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e02424',
                        cancelButtonColor: '#475569',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
