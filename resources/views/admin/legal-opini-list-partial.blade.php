<!-- Table Container -->
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                <th class="py-3.5 pl-6 pr-4">Judul Artikel</th>
                <th class="py-3.5 px-4">Gambar</th>
                <th class="py-3.5 px-4">Tautan / Slug</th>
                <th class="py-3.5 px-4">Penerbit &amp; Penulis</th>
                <th class="py-3.5 px-4">Tanggal Terbit</th>
                <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse ($legal_opinis as $row)
                <tr class="hover:bg-slate-50/80 transition">
                    <td class="py-4 pl-6 pr-4">
                        <div class="font-semibold text-slate-900 truncate max-w-xs sm:max-w-md" title="{{ $row->title }}">
                            {{ $row->title }}
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <img src="{{ asset('storage/' . $row->picture) }}" alt="Gambar {{ $row->title }}"
                            class="w-14 h-14 rounded-lg border border-slate-200 object-cover">
                    </td>
                    <td class="py-4 px-4">
                        <div class="truncate max-w-[200px]">
                            <a href="{{ $row->slug ? route('article.show', $row->slug) : $row->url }}" target="_blank"
                                class="font-semibold text-amber-700 hover:text-amber-900 hover:underline transition">
                                {{ $row->title }}
                            </a>
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <div class="flex flex-col text-xs space-y-0.5">
                            <span class="font-semibold text-slate-900 inline-flex items-center gap-1.5">
                                <i class="ti ti-user text-slate-400"></i> {{ $row->author }}
                            </span>
                            <span class="text-slate-600 inline-flex items-center gap-1.5">
                                <i class="ti ti-building text-slate-400"></i> {{ $row->publisher }}
                            </span>
                        </div>
                    </td>
                    <td class="py-4 px-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-100 text-amber-900 border border-amber-200 text-xs font-semibold">
                            {{ \Carbon\Carbon::parse($row->date_publish)->format('d M Y') }}
                        </span>
                    </td>
                    <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                        <div class="relative inline-block">
                            <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-opini-{{ $row->id }}')"
                                class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                <i class="ti ti-dots-vertical text-lg"></i>
                            </button>
                            <div id="dropdown-opini-{{ $row->id }}"
                                class="admin-dropdown-menu hidden absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                <button type="button" onclick="openAdminModal('editArtikel{{ $row->id }}')"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                                    <i class="ti ti-pencil text-sm text-amber-700"></i>
                                    <span>Edit</span>
                                </button>

                                <form action="{{ route('legal_opini.destroy', $row->id) }}" method="POST" class="form-delete">
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
                            <i class="ti ti-file-off text-4xl"></i>
                            @if (!empty($search))
                                <span class="text-sm font-bold text-slate-700">Tidak Ada Artikel yang Cocok</span>
                                <p class="text-xs text-slate-500">
                                    Pencarian dengan kata kunci <span class="font-bold text-slate-800">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan hasil.
                                </p>
                                <button type="button" onclick="clearAdminLegalOpiniSearch()"
                                    class="mt-2 inline-flex items-center justify-center px-4 py-2 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded-lg hover:bg-ns-navy-800 transition cursor-pointer">
                                    Reset Pencarian
                                </button>
                            @else
                                <span class="text-sm font-medium text-slate-500">Tidak ada artikel hukum yang tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Bar (Sama seperti halaman interface) -->
@if ($legal_opinis->hasPages())
    <div class="px-6 py-2 bg-slate-50 border-t border-slate-200">
        {{ $legal_opinis->links('interface.layout.pagination') }}
    </div>
@endif

<!-- Modal Edit Artikel (untuk item pada halaman aktif) -->
@foreach ($legal_opinis as $data)
    <div id="editArtikel{{ $data->id }}" aria-hidden="true"
        class="admin-modal-backdrop hidden fixed inset-0 z-50 items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-2xl overflow-hidden my-8">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-900">Edit Artikel Hukum</h3>
                <button type="button" onclick="closeAdminModal('editArtikel{{ $data->id }}')"
                    class="w-8 h-8 rounded-lg text-slate-500 hover:bg-slate-200 hover:text-slate-900 flex items-center justify-center transition">
                    <i class="ti ti-x text-lg"></i>
                </button>
            </div>

            <form method="POST" action="{{ route('legal_opini.update', $data->id) }}" enctype="multipart/form-data"
                id="formArticleEdit{{ $data->id }}" onsubmit="document.getElementById('loading-screen').style.display = 'flex';"
                class="p-6 space-y-4">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Judul -->
                    <div>
                        <label for="title_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Artikel</label>
                        <input type="text" id="title_{{ $data->id }}" name="title" value="{{ old('title', $data->title) }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="publisher_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Penerbit</label>
                        <input type="text" id="publisher_{{ $data->id }}" name="publisher" value="{{ old('publisher', $data->publisher) }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <!-- Penulis -->
                    <div>
                        <label for="author_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Penulis</label>
                        <input type="text" id="author_{{ $data->id }}" name="author" value="{{ old('author', $data->author) }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>

                    <!-- Tanggal Terbit -->
                    <div>
                        <label for="date_publish_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tanggal Terbit</label>
                        <input type="date" id="date_publish_{{ $data->id }}" name="date_publish" value="{{ old('date_publish', $data->date_publish) }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    </div>
                </div>

                <!-- Foto Terkait -->
                <div>
                    <label for="picture_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Foto Terkait</label>
                    @if ($data->picture)
                        <img src="{{ asset('storage/' . $data->picture) }}" alt="Preview" class="w-20 h-20 rounded-lg border border-slate-200 object-cover mb-2">
                    @endif
                    <input type="file" id="picture_{{ $data->id }}" name="picture"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                </div>

                <!-- URL Artikel -->
                <div>
                    <label for="url_{{ $data->id }}" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">URL / Link Artikel</label>
                    <input type="url" id="url_{{ $data->id }}" name="url" value="{{ old('url', $data->url) }}"
                        class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeAdminModal('editArtikel{{ $data->id }}')"
                        class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition">
                        Perbarui Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach
