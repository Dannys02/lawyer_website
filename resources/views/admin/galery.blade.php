@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <!-- Main Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Manajemen Galeri Kegiatan</h1>
                    <p class="text-xs text-slate-600">Kelola dokumentasi visual dan arsip kegiatan kantor hukum</p>
                </div>
                <a href="{{ route('galery.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer self-start sm:self-auto">
                    <i class="ti ti-plus text-sm"></i>
                    <span>Tambah Foto</span>
                </a>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                            <th class="py-3.5 pl-6 pr-4">Nama Dokumentasi</th>
                            <th class="py-3.5 px-4">Foto</th>
                            <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($galeries as $row)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 pl-6 pr-4">
                                    <div class="font-semibold text-slate-900 truncate max-w-md" title="{{ $row->name }}">
                                        {{ $row->name }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $row->image) }}" alt="Foto {{ $row->name }}"
                                        class="w-16 h-16 rounded-lg border border-slate-200 object-cover" loading="lazy">
                                </td>
                                <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                                    <div class="relative inline-block">
                                        <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-galery-{{ $row->id }}')"
                                            class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                            <i class="ti ti-dots-vertical text-lg"></i>
                                        </button>
                                        <div id="dropdown-galery-{{ $row->id }}"
                                            class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                            <a href="{{ route('galery.edit', $row->id) }}"
                                                class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                                <i class="ti ti-pencil text-sm text-amber-700"></i>
                                                <span>Edit</span>
                                            </a>

                                            <form action="{{ route('galery.destroy', $row->id) }}" method="POST" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-name="{{ $row->name }}"
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
                                <td colspan="3" class="py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2 text-slate-400">
                                        <i class="ti ti-photo-off text-4xl"></i>
                                        <span class="text-sm font-medium text-slate-500">Tidak ada Gambar/Foto yang tersedia</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Bar -->
            @if ($galeries->hasPages())
                <div class="px-6 py-2 bg-slate-50 border-t border-slate-200">
                    {{ $galeries->links('interface.layout.pagination') }}
                </div>
            @endif
        </div>
    </div>
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
