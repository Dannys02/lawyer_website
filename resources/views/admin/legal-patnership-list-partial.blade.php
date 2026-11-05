<!-- Table Container -->
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                <th class="py-3.5 pl-6 pr-4">Nama Advokat / Mitra</th>
                <th class="py-3.5 px-4">Foto</th>
                <th class="py-3.5 px-4">Jabatan / Keahlian</th>
                <th class="py-3.5 px-4">Deskripsi Ringkas</th>
                <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse ($legal_patnerships as $row)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 pl-6 pr-4 whitespace-nowrap">
                        <span class="font-semibold text-slate-900">{{ $row->name }}</span>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <img src="{{ asset('storage/' . $row->photo) }}" alt="Foto {{ $row->name }}"
                            class="w-14 h-14 rounded-lg border border-slate-200 object-cover" loading="lazy">
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-100 text-amber-900 border border-amber-200 text-xs font-semibold">
                            {{ $row->position }}
                        </span>
                    </td>
                    <td class="py-4 px-4 max-w-sm">
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed line-clamp-2">
                            {{ Str::limit(strip_tags($row->description), 180) }}
                        </p>
                    </td>
                    <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                        <div class="relative inline-block">
                            <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-partner-{{ $row->id }}')"
                                class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                <i class="ti ti-dots-vertical text-lg"></i>
                            </button>
                            <div id="dropdown-partner-{{ $row->id }}"
                                class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                <a href="{{ route('legal_patnership.edit', $row->id) }}"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                    <i class="ti ti-pencil text-sm text-amber-700"></i>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('legal_patnership.destroy', $row->id) }}" method="POST" class="form-delete">
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
                    <td colspan="5" class="py-12 px-6 text-center">
                        <div class="flex flex-col items-center justify-center gap-2 text-slate-400 max-w-md mx-auto">
                            <i class="ti ti-users-minus text-4xl"></i>
                            @if (!empty($search))
                                <span class="text-sm font-bold text-slate-700">Partner Tidak Ditemukan</span>
                                <p class="text-xs text-slate-500">
                                    Pencarian dengan kata kunci <span class="font-bold text-slate-800">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan data partner/advokat.
                                </p>
                                <button type="button" onclick="clearAdminPartnerSearch()"
                                    class="mt-2 inline-flex items-center justify-center px-4 py-2 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded-lg hover:bg-ns-navy-800 transition cursor-pointer">
                                    Reset Pencarian
                                </button>
                            @else
                                <span class="text-sm font-medium text-slate-500">Tidak ada Partner yang tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Bar -->
@if ($legal_patnerships->hasPages())
    <div class="px-6 py-2 bg-slate-50 border-t border-slate-200">
        {{ $legal_patnerships->links('interface.layout.pagination') }}
    </div>
@endif
