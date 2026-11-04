@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <!-- Header Sambutan Ringkas & Elegan -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Dashboard Ringkasan</h1>
                <p class="text-xs sm:text-sm text-slate-600 mt-0.5">Selamat datang kembali di panel administrasi Kantor Hukum Nurul Syafii.</p>
            </div>
            <div>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-amber-100 text-amber-900 border border-amber-200 text-xs font-semibold shadow-sm">
                    <i class="ti ti-calendar text-amber-700 text-sm"></i>
                    <span>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                </span>
            </div>
        </div>

        <!-- 4 Kartu Metrik Utama -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            <!-- Metrik Jurnal -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Total Jurnal</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 my-1">{{ $jurnals }}</h2>
                    <a href="{{ route('jurnal.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-900 transition">
                        <span>Kelola Jurnal</span>
                        <i class="ti ti-chevron-right text-xs"></i>
                    </a>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 border border-amber-200 text-amber-800 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="ti ti-book"></i>
                </div>
            </div>

            <!-- Metrik Artikel Opini -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Artikel Opini</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 my-1">{{ $opinies }}</h2>
                    <a href="{{ route('legal_opini.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-900 transition">
                        <span>Kelola Artikel</span>
                        <i class="ti ti-chevron-right text-xs"></i>
                    </a>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 border border-amber-200 text-amber-800 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="ti ti-file-text"></i>
                </div>
            </div>

            <!-- Metrik Berita -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Total Berita</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 my-1">{{ $news }}</h2>
                    <a href="{{ route('news.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-900 transition">
                        <span>Kelola Berita</span>
                        <i class="ti ti-chevron-right text-xs"></i>
                    </a>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 border border-amber-200 text-amber-800 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="ti ti-news"></i>
                </div>
            </div>

            <!-- Metrik Tim / Partner -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Advokat &amp; Partner</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 my-1">{{ $patners }}</h2>
                    <a href="{{ route('legal_patnership.index') }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-900 transition">
                        <span>Kelola Tim</span>
                        <i class="ti ti-chevron-right text-xs"></i>
                    </a>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 border border-amber-200 text-amber-800 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="ti ti-briefcase"></i>
                </div>
            </div>
        </div>

        <!-- Tabel Rating dan Ulasan Klien -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Rating &amp; Ulasan Klien</h3>
                    <p class="text-xs text-slate-600">Masukan dan umpan balik langsung dari pengunjung website</p>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-amber-100 text-amber-900 border border-amber-200 text-xs font-bold self-start sm:self-auto">
                    {{ $reviews->count() }} Ulasan Masuk
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-600">
                            <th class="py-3.5 pl-6 pr-4">Nama Klien</th>
                            <th class="py-3.5 px-4">Penilaian (Rating)</th>
                            <th class="py-3.5 px-4">Pesan / Ulasan</th>
                            <th class="py-3.5 pl-4 pr-6 text-center w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($reviews as $row)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 pl-6 pr-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-amber-100 border border-amber-200 text-amber-900 font-bold text-xs flex items-center justify-center flex-shrink-0">
                                            {{ strtoupper(substr($row->name, 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-slate-900">{{ $row->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star text-xs {{ $i <= $row->rating ? 'text-amber-500' : 'text-slate-300' }}"></i>
                                        @endfor
                                        <span class="ml-1.5 text-xs font-semibold text-slate-600">({{ $row->rating }}/5)</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 max-w-md">
                                    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed line-clamp-3">
                                        {{ $row->message }}
                                    </p>
                                </td>
                                <td class="py-4 pl-4 pr-6 text-center whitespace-nowrap relative">
                                    <div class="relative inline-block">
                                        <button type="button" onclick="toggleAdminDropdown(event, 'dropdown-review-{{ $row->id }}')"
                                            class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-900 inline-flex items-center justify-center transition">
                                            <i class="ti ti-dots-vertical text-lg"></i>
                                        </button>
                                        <div id="dropdown-review-{{ $row->id }}"
                                            class="admin-dropdown-menu hidden absolute right-0 mt-1 w-44 bg-white rounded-xl shadow-lg border border-slate-200 py-1.5 z-30 text-left">
                                            <form action="{{ route('reviews.destroy', $row->id) }}" method="POST" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-name="{{ $row->name }}"
                                                    class="btn-delete w-full flex items-center gap-2 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 transition">
                                                    <i class="ti ti-trash text-sm"></i>
                                                    <span>Hapus Ulasan</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-2 text-slate-400">
                                        <i class="ti ti-message-off text-4xl"></i>
                                        <span class="text-sm font-medium text-slate-500">Belum ada ulasan atau penilaian yang masuk</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
                    title: 'Hapus Ulasan?',
                    text: `Ulasan dari "${name}" akan dihapus secara permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e02424',
                    cancelButtonColor: '#475569',
                    confirmButtonText: 'Ya, Hapus!',
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
