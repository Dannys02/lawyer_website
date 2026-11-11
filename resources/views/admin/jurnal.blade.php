@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6" id="daftar-jurnal-admin">
        <!-- Main Card -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Manajemen Kumpulan Undang-Undang</h1>
                    <p class="text-xs text-slate-600">Kelola berkas publikasi peraturan perundang-undangan dan dokumen hukum</p>
                </div>

                <!-- Search Input (di pinggir kiri tombol Tambah Jurnal) & Tombol Tambah Jurnal -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">
                    <form id="admin-jurnal-search-form" action="{{ route('jurnal.index') }}" method="GET" onsubmit="return false;"
                        class="relative w-full sm:w-72 md:w-80">
                        <label for="admin-jurnal-search-input" class="sr-only">Cari undang-undang</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400 pointer-events-none text-sm">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>

                            <input type="text" id="admin-jurnal-search-input" name="search" value="{{ $search ?? '' }}"
                                placeholder="Cari judul atau deskripsi undang-undang..." autocomplete="off"
                                class="w-full pl-9 pr-16 py-2 bg-white text-xs sm:text-sm text-slate-900 placeholder:text-slate-400 border border-slate-300 rounded-xl focus:outline-none focus:border-ns-gold-500 focus:ring-2 focus:ring-ns-gold-500/20 shadow-sm transition">

                            <div class="absolute right-2.5 flex items-center gap-1.5">
                                <div id="admin-jurnal-search-spinner" class="hidden text-amber-600 animate-spin text-xs"
                                    title="Mencari...">
                                    <i class="fas fa-circle-notch" aria-hidden="true"></i>
                                </div>

                                <button type="button" id="admin-jurnal-search-clear-btn" onclick="clearAdminJurnalSearch()"
                                    class="{{ empty($search) ? 'hidden' : 'inline-flex' }} items-center justify-center w-6 h-6 text-xs text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-full transition cursor-pointer"
                                    aria-label="Hapus kata kunci pencarian">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('jurnal.create') }}"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer flex-shrink-0">
                        <i class="ti ti-plus text-sm"></i>
                        <span>Tambah Jurnal</span>
                    </a>
                </div>
            </div>

            <!-- Status Pencarian Bar -->
            <div id="admin-jurnal-search-status-wrapper" class="{{ empty($search) ? 'hidden' : 'block' }} px-6 py-2 bg-amber-50/70 border-b border-amber-200/70 text-xs text-slate-700">
                <span id="admin-jurnal-search-status">
                    @if (!empty($search))
                        Hasil pencarian untuk: &ldquo;<strong class="text-slate-900">{{ $search }}</strong>&rdquo;
                    @endif
                </span>
            </div>

            <!-- Dynamic Container (Table + Pagination) -->
            <div id="admin-jurnal-container" class="transition-opacity duration-200">
                @include('admin.jurnal-list-partial')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('admin-jurnal-search-input');
            const spinner = document.getElementById('admin-jurnal-search-spinner');
            const clearBtn = document.getElementById('admin-jurnal-search-clear-btn');
            const statusWrapper = document.getElementById('admin-jurnal-search-status-wrapper');
            const statusText = document.getElementById('admin-jurnal-search-status');
            const container = document.getElementById('admin-jurnal-container');

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
                        fetchAdminJurnal(query);
                    }, 400);
                });
            }

            function fetchAdminJurnal(keyword) {
                if (currentAbortController) {
                    currentAbortController.abort();
                }
                currentAbortController = new AbortController();

                if (spinner) spinner.classList.remove('hidden');
                if (statusWrapper && statusText) {
                    statusWrapper.classList.remove('hidden');
                    statusText.innerHTML = keyword
                        ? `Mencari &ldquo;<strong class="text-slate-900">${keyword}</strong>&rdquo;...`
                        : 'Memuat seluruh jurnal...';
                }
                container.style.opacity = '0.6';

                const url = new URL("{{ route('jurnal.index') }}", window.location.origin);
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

                                const headerElement = document.getElementById('daftar-jurnal-admin');
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

            window.clearAdminJurnalSearch = function() {
                if (!input) return;
                input.value = '';
                if (clearBtn) {
                    clearBtn.classList.add('hidden');
                    clearBtn.classList.remove('inline-flex');
                }
                clearTimeout(debounceTimer);
                fetchAdminJurnal('');
                input.focus();
            };
        });
    </script>
@endpush
