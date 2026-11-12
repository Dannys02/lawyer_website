<!-- Table Container -->
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                <th class="py-3.5 pl-6 pr-4">Jenis &amp; Nomor</th>
                <th class="py-3.5 px-4">Tentang</th>
                <th class="py-3.5 px-4">Status</th>
                <th class="py-3.5 px-4">Dibaca</th>
                <th class="py-3.5 px-4">Diundangkan</th>
                <th class="py-3.5 px-4">Berkas PDF</th>
                <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse ($peraturans as $row)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 pl-6 pr-4 whitespace-nowrap">
                        <div class="font-bold text-slate-900 text-xs sm:text-sm">
                            {{ $row->jenis_peraturan }}
                        </div>
                        <div class="text-xs text-amber-700 font-semibold mt-0.5">
                            Nomor {{ $row->nomor }} Tahun {{ $row->tahun }}
                        </div>
                    </td>
                    <td class="py-4 px-4 max-w-xs sm:max-w-md">
                        <div class="font-medium text-slate-900 leading-snug line-clamp-2" title="{{ $row->tentang }}">
                            {{ $row->tentang }}
                        </div>
                        @if ($row->materi_pokok)
                            <p class="text-[11px] text-slate-500 mt-1 line-clamp-1">
                                {{ Str::limit(strip_tags($row->materi_pokok), 100) }}
                            </p>
                        @endif
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        @if ($row->status === 'Berlaku')
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ $row->status }}
                            </span>
                        @elseif ($row->status === 'Diubah')
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                {{ $row->status }}
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                {{ $row->status }}
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded border border-slate-200">
                            <i class="far fa-eye text-amber-600"></i>
                            <span>{{ number_format($row->views ?? 0) }}x</span>
                        </span>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap text-xs text-slate-600">
                        {{ $row->tanggal_pengundangan ? $row->tanggal_pengundangan->locale('id')->isoFormat('D MMMM Y') : '-' }}
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        @if ($row->file_path)
                            <a href="{{ asset('storage/' . $row->file_path) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-amber-300 bg-amber-50 text-amber-900 hover:bg-amber-100 text-xs font-bold transition">
                                <i class="ti ti-file-text text-sm text-amber-700"></i>
                                <span>Lihat PDF</span>
                            </a>
                        @else
                            <span class="text-xs text-slate-400 italic">Tidak ada file</span>
                        @endif
                    </td>
                    <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                        <div class="relative inline-block">
                            <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-peraturan-{{ $row->id }}')"
                                class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                <i class="ti ti-dots-vertical text-lg"></i>
                            </button>
                            <div id="dropdown-peraturan-{{ $row->id }}"
                                class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                <a href="{{ route('peraturan.edit', $row->id) }}"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                    <i class="ti ti-pencil text-sm text-amber-700"></i>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('peraturan.destroy', $row->id) }}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-name="{{ $row->jenis_peraturan }} No. {{ $row->nomor }} Th. {{ $row->tahun }}"
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
                    <td colspan="7" class="py-12 px-6 text-center">
                        <div class="flex flex-col items-center justify-center gap-2 text-slate-400 max-w-md mx-auto">
                            <i class="ti ti-scale-off text-4xl"></i>
                            @if (!empty($search))
                                <span class="text-sm font-bold text-slate-700">Peraturan Tidak Ditemukan</span>
                                <p class="text-xs text-slate-500">
                                    Pencarian dengan kata kunci <span class="font-bold text-slate-800">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan dokumen peraturan.
                                </p>
                                <button type="button" onclick="clearAdminPeraturanSearch()"
                                    class="mt-2 inline-flex items-center justify-center px-4 py-2 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded-lg hover:bg-ns-navy-800 transition cursor-pointer">
                                    Reset Pencarian
                                </button>
                            @else
                                <span class="text-sm font-medium text-slate-500">Belum ada peraturan yang tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Bar -->
@if ($peraturans->hasPages())
    <div class="px-6 py-2 bg-slate-50 border-t border-slate-200">
        {{ $peraturans->links('interface.layout.pagination') }}
    </div>
@endif
