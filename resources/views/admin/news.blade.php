@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6" id="daftar-news-admin">
        <!-- Main Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Manajemen Berita &amp; Liputan Media</h1>
                    <p class="text-xs text-slate-600">Kelola publikasi warta pers dan liputan kegiatan hukum</p>
                </div>

                <!-- Search Input (di pinggir kiri tombol Tambah Berita) & Tombol Tambah Berita -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">
                    <form id="admin-news-search-form" action="{{ route('news.index') }}" method="GET" onsubmit="return false;"
                        class="relative w-full sm:w-72 md:w-80">
                        <label for="admin-news-search-input" class="sr-only">Cari berita atau penerbit</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400 pointer-events-none text-sm">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>

                            <input type="text" id="admin-news-search-input" name="search" value="{{ $search ?? '' }}"
                                placeholder="Cari judul berita atau penerbit..." autocomplete="off"
                                class="w-full pl-9 pr-16 py-2 bg-white text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 border border-slate-300 rounded-xl focus:outline-none focus:border-ns-gold-500 focus:ring-2 focus:ring-ns-gold-500/20 shadow-sm transition">

                            <div class="absolute right-2.5 flex items-center gap-1.5">
                                <div id="admin-news-search-spinner" class="hidden text-amber-600 animate-spin text-xs"
                                    title="Mencari...">
                                    <i class="fas fa-circle-notch" aria-hidden="true"></i>
                                </div>

                                <button type="button" id="admin-news-search-clear-btn" onclick="clearAdminNewsSearch()"
                                    class="{{ empty($search) ? 'hidden' : 'inline-flex' }} items-center justify-center w-6 h-6 text-xs text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-full transition cursor-pointer"
                                    aria-label="Hapus kata kunci pencarian">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <button type="button" onclick="openAdminModal('tambahArtikel')"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer flex-shrink-0">
                        <i class="ti ti-plus text-sm"></i>
                        <span>Tambah Berita</span>
                    </button>
                </div>
            </div>

            <!-- Status Pencarian Bar -->
            <div id="admin-news-search-status-wrapper" class="{{ empty($search) ? 'hidden' : 'block' }} px-6 py-2 bg-amber-50/70 border-b border-amber-200/70 text-xs text-slate-700">
                <span id="admin-news-search-status">
                    @if (!empty($search))
                        Hasil pencarian untuk: &ldquo;<strong class="text-slate-900">{{ $search }}</strong>&rdquo;
                    @endif
                </span>
            </div>

            <!-- Dynamic Container (Table + Pagination + Edit Modals) -->
            <div id="admin-news-container" class="transition-opacity duration-200">
                @include('admin.news-list-partial')
            </div>
        </div>
    </div>

    <!-- Modal Tambah Berita -->
    <div id="tambahArtikel" aria-hidden="true"
        class="admin-modal-backdrop hidden fixed inset-0 z-50 items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-2xl overflow-hidden my-8">
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-900">Tambah Berita</h3>
                <button type="button" onclick="closeAdminModal('tambahArtikel')"
                    class="w-8 h-8 rounded-lg text-slate-500 hover:bg-slate-200 hover:text-slate-900 flex items-center justify-center transition">
                    <i class="ti ti-x text-lg"></i>
                </button>
            </div>

            <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" id="formArticle"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Judul -->
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Berita</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border @error('title') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('title')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="publisher" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Penerbit</label>
                        <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border @error('publisher') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('publisher')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Terbit -->
                    <div>
                        <label for="date_publish" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tanggal Terbit</label>
                        <input type="date" id="date_publish" name="date_publish" value="{{ old('date_publish') }}"
                            class="w-full px-3.5 py-2.5 rounded-lg border @error('date_publish') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('date_publish')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Foto Terkait -->
                <div>
                    <label for="picture" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Foto Terkait</label>
                    <input type="file" id="picture" name="picture"
                        class="w-full text-sm text-slate-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-900 hover:file:bg-amber-200 border border-slate-300 rounded-lg p-1.5" />
                    @error('picture')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URL Berita -->
                <div>
                    <label for="url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">URL Berita</label>
                    <input type="url" id="url" name="url" value="{{ old('url') }}"
                        class="w-full px-3.5 py-2.5 rounded-lg border @error('url') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('url')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeAdminModal('tambahArtikel')"
                        class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('admin-news-search-input');
            const spinner = document.getElementById('admin-news-search-spinner');
            const clearBtn = document.getElementById('admin-news-search-clear-btn');
            const statusWrapper = document.getElementById('admin-news-search-status-wrapper');
            const statusText = document.getElementById('admin-news-search-status');
            const container = document.getElementById('admin-news-container');

            let debounceTimer = null;
            let currentAbortController = null;

            function bindDeleteButtons() {
                if (!container) return;
                const deleteButtons = container.querySelectorAll('.btn-delete');
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
            }

            if (input && container) {
                input.addEventListener('input', function() {
                    const query = input.value.trim();

                    if (clearBtn) {
                        if (query.length > 0) {
                            clearBtn.classList.remove('hidden');
                            clearBtn.classList.add('inline-flex');
                        } else {
                            clearBtn.classList.add('hidden');
                            clearBtn.classList.remove('inline-flex');
                        }
                    }

                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        fetchAdminNews(query);
                    }, 400);
                });
            }

            function fetchAdminNews(keyword) {
                if (currentAbortController) {
                    currentAbortController.abort();
                }
                currentAbortController = new AbortController();

                if (spinner) spinner.classList.remove('hidden');
                if (statusWrapper && statusText) {
                    statusWrapper.classList.remove('hidden');
                    statusText.innerHTML = keyword
                        ? `Mencari &ldquo;<strong class="text-slate-900">${keyword}</strong>&rdquo;...`
                        : 'Memuat seluruh berita...';
                }
                container.style.opacity = '0.6';

                const url = new URL("{{ route('news.index') }}", window.location.origin);
                if (keyword) {
                    url.searchParams.set('search', keyword);
                }

                fetch(url.toString(), {
                        signal: currentAbortController.signal,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'text/html, application/xhtml+xml'
                        }
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Network error');
                        return res.text();
                    })
                    .then(html => {
                        container.innerHTML = html;
                        container.style.opacity = '1';
                        if (spinner) spinner.classList.add('hidden');

                        if (statusWrapper && statusText) {
                            if (keyword) {
                                statusWrapper.classList.remove('hidden');
                                statusText.innerHTML = `Hasil pencarian untuk: &ldquo;<strong class="text-slate-900">${keyword}</strong>&rdquo;`;
                            } else {
                                statusWrapper.classList.add('hidden');
                                statusText.innerHTML = '';
                            }
                        }

                        window.history.replaceState({}, '', url.toString());
                        attachAdminPaginationEvents();
                        bindDeleteButtons();
                    })
                    .catch(err => {
                        if (err.name !== 'AbortError') {
                            console.error('Fetch error:', err);
                            if (spinner) spinner.classList.add('hidden');
                            container.style.opacity = '1';
                            if (statusWrapper && statusText) {
                                statusWrapper.classList.remove('hidden');
                                statusText.innerHTML = '<span class="text-red-600 font-semibold">Gagal memuat data pencarian.</span>';
                            }
                        }
                    });
            }

            function attachAdminPaginationEvents() {
                if (!container) return;
                const paginationLinks = container.querySelectorAll('a[href*="page="]');
                paginationLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetUrl = new URL(this.href);

                        if (spinner) spinner.classList.remove('hidden');
                        container.style.opacity = '0.6';

                        fetch(targetUrl.toString(), {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'text/html, application/xhtml+xml'
                                }
                            })
                            .then(res => res.text())
                            .then(html => {
                                container.innerHTML = html;
                                container.style.opacity = '1';
                                if (spinner) spinner.classList.add('hidden');
                                window.history.pushState({}, '', targetUrl.toString());
                                attachAdminPaginationEvents();
                                bindDeleteButtons();

                                const headerElement = document.getElementById('daftar-news-admin');
                                if (headerElement) {
                                    headerElement.scrollIntoView({ behavior: 'smooth' });
                                }
                            })
                            .catch(err => {
                                console.error('Pagination error:', err);
                                window.location.href = targetUrl.toString();
                            });
                    });
                });
            }

            attachAdminPaginationEvents();
            bindDeleteButtons();

            window.clearAdminNewsSearch = function() {
                if (!input) return;
                input.value = '';
                if (clearBtn) {
                    clearBtn.classList.add('hidden');
                    clearBtn.classList.remove('inline-flex');
                }
                clearTimeout(debounceTimer);
                fetchAdminNews('');
                input.focus();
            };
        });
    </script>
@endpush
