<!-- Table Container -->
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                <th class="py-3.5 pl-6 pr-4">Judul Berita</th>
                <th class="py-3.5 px-4">Gambar</th>
                <th class="py-3.5 px-4">Tautan Berita</th>
                <th class="py-3.5 px-4">Penerbit</th>
                <th class="py-3.5 px-4">Tanggal Terbit</th>
                <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse ($news as $row)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 pl-6 pr-4">
                        <div class="font-semibold text-slate-900 truncate max-w-xs sm:max-w-md" title="{{ $row->title }}">
                            {{ $row->title }}
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        @if ($row->picture)
                            <img src="{{ asset('storage/' . $row->picture) }}" alt="Gambar {{ $row->title }}"
                                class="w-14 h-14 rounded-lg border border-slate-200 object-cover" loading="lazy">
                        @else
                            <span class="text-xs text-slate-400 italic">Tanpa Gambar</span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <div class="truncate max-w-[200px]">
                            <a href="{{ $row->url }}" target="_blank"
                                class="font-semibold text-amber-700 hover:text-amber-900 hover:underline transition">
                                {{ $row->title }}
                            </a>
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="font-semibold text-slate-900 inline-flex items-center gap-1.5 text-xs">
                            <i class="ti ti-building text-amber-600"></i> {{ $row->publisher }}
                        </span>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-100 text-amber-900 border border-amber-200 text-xs font-semibold">
                            {{ \Carbon\Carbon::parse($row->date_publish)->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                        <div class="relative inline-block">
                            <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-news-{{ $row->id }}')"
                                class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                <i class="ti ti-dots-vertical text-lg"></i>
                            </button>
                            <div id="dropdown-news-{{ $row->id }}"
                                class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                <a href="{{ route('news.edit', $row->id) }}"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                    <i class="ti ti-pencil text-sm text-amber-700"></i>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('news.destroy', $row->id) }}" method="POST" class="form-delete">
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
                    <td colspan="6" class="py-12 px-6 text-center">
                        <div class="flex flex-col items-center justify-center gap-2 text-slate-400 max-w-md mx-auto">
                            <i class="ti ti-news-off text-4xl"></i>
                            @if (!empty($search))
                                <span class="text-sm font-bold text-slate-700">Berita Tidak Ditemukan</span>
                                <p class="text-xs text-slate-500">
                                    Pencarian dengan kata kunci <span class="font-bold text-slate-800">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan hasil berita.
                                </p>
                                <button type="button" onclick="clearAdminNewsSearch()"
                                    class="mt-2 inline-flex items-center justify-center px-4 py-2 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded-lg hover:bg-ns-navy-800 transition cursor-pointer">
                                    Reset Pencarian
                                </button>
                            @else
                                <span class="text-sm font-medium text-slate-500">Tidak ada berita yang tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Bar -->
@if ($news->hasPages())
    <div class="px-6 py-2 bg-slate-50 border-t border-slate-200">
        {{ $news->links('interface.layout.pagination') }}
    </div>
@endif
