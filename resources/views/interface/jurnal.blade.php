@extends('interface.layout.app')
@section('title', 'Kumpulan Undang-Undang | Pengacara Banyuwangi Safi')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="jurnal-banner-heading">
        <!-- Background Media with Gradient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
            <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt=""
                class="w-full h-full object-cover object-center opacity-15" fetchpriority="high">
            <div class="absolute inset-0 bg-gradient-to-r from-ns-navy-950/95 via-ns-navy-900/90 to-ns-navy-800/85"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
            <div class="max-w-3xl">
                <!-- Breadcrumbs -->
                <nav class="flex items-center justify-center sm:justify-start gap-2 text-xs font-semibold uppercase tracking-widest text-ns-light-300 mb-4"
                    aria-label="Breadcrumb">
                    <a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors">Home</a>
                    <span class="text-ns-gold-400">&bull;</span>
                    <span class="text-ns-gold-400" aria-current="page">Kumpulan Undang-Undang</span>
                </nav>

                <p
                    class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    ARSIP &amp; PUBLIKASI HUKUM
                </p>
                <h1 id="jurnal-banner-heading"
                    class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Kumpulan <span class="text-ns-gold-400">Undang-Undang</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Koleksi dokumen peraturan perundang-undangan dan telaah hukum dari Kantor Hukum Nurul Safii
                    &amp; Partners yang dapat diakses dan diunduh sebagai referensi praktis maupun akademis.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Jurnals Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-jurnal"
        aria-labelledby="jurnal-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter / Debounced Search Input Form -->
            <div
                class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 pb-6 border-b border-ns-border-light">
                <div class="max-w-xl">
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Dokumen Peraturan &amp; Literatur</span>
                    </div>
                    <h2 id="jurnal-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Kumpulan Undang-Undang
                    </h2>
                </div>

                <!-- Debounced Search Input Bar -->
                <div class="w-full lg:w-96 flex-shrink-0">
                    <form id="jurnal-search-form" action="{{ route('file') }}" method="GET" onsubmit="return false;"
                        class="relative">
                        <label for="jurnal-search-input" class="sr-only">Cari judul atau topik undang-undang</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-ns-ink-500 pointer-events-none text-sm">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>

                            <input type="text" id="jurnal-search-input" name="search" value="{{ $search ?? '' }}"
                                placeholder="Cari undang-undang atau kata kunci..." autocomplete="off"
                                class="w-full pl-10 pr-20 py-3 bg-white text-sm text-ns-ink-900 placeholder:text-ns-ink-500 border-2 border-ns-border-light rounded-lg focus:outline-none focus:border-ns-gold-500 focus:ring-1 focus:ring-ns-gold-500 shadow-sm transition">

                            <!-- Clear & Loading Indicators -->
                            <div class="absolute right-3 flex items-center gap-2">
                                <div id="jurnal-search-spinner" class="hidden text-ns-gold-700 animate-spin text-sm"
                                    title="Mencari...">
                                    <i class="fas fa-circle-notch" aria-hidden="true"></i>
                                </div>

                                <button type="button" id="jurnal-search-clear-btn" onclick="clearJurnalSearch()"
                                    class="{{ empty($search) ? 'hidden' : 'inline-flex' }} items-center justify-center w-6 h-6 text-xs text-ns-ink-500 hover:text-ns-navy-900 hover:bg-ns-paper rounded-full transition"
                                    aria-label="Hapus kata kunci pencarian">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-[11px] text-ns-ink-500 mt-1.5 px-1">
                            <span id="jurnal-search-status">
                                @if (!empty($search))
                                    Hasil untuk: &ldquo;<strong class="text-ns-navy-900">{{ $search }}</strong>&rdquo;
                                @endif
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dynamic Jurnal Container -->
            <div id="jurnal-container" class="transition-opacity duration-200">
                @include('interface.jurnal-list-partial')
            </div>
        </div>
    </section>
    <!--================ End Jurnals Section =================-->
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('jurnal-search-input');
            const spinner = document.getElementById('jurnal-search-spinner');
            const clearBtn = document.getElementById('jurnal-search-clear-btn');
            const statusText = document.getElementById('jurnal-search-status');
            const container = document.getElementById('jurnal-container');

            if (!input || !container) return;

            let debounceTimer = null;
            let currentAbortController = null;

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
                    fetchJurnals(query);
                }, 400);
            });

            function fetchJurnals(keyword) {
                if (currentAbortController) {
                    currentAbortController.abort();
                }
                currentAbortController = new AbortController();

                if (spinner) spinner.classList.remove('hidden');
                if (statusText) {
                    statusText.innerHTML = keyword ?
                        `Mencari &ldquo;<strong class="text-ns-navy-900">${keyword}</strong>&rdquo;...` :
                        'Memuat seluruh jurnal...';
                }
                container.style.opacity = '0.6';

                const url = new URL("{{ route('file') }}", window.location.origin);
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

                        if (statusText) {
                            statusText.innerHTML = keyword ?
                                `Hasil untuk: &ldquo;<strong class="text-ns-navy-900">${keyword}</strong>&rdquo;` :
                                '';
                        }

                        window.history.replaceState({}, '', url.toString());
                        attachJurnalPagination();
                    })
                    .catch(err => {
                        if (err.name !== 'AbortError') {
                            console.error('Fetch error:', err);
                            if (spinner) spinner.classList.add('hidden');
                            container.style.opacity = '1';
                            if (statusText) {
                                statusText.innerHTML =
                                    '<span class="text-red-600">Gagal memuat data pencarian.</span>';
                            }
                        }
                    });
            }

            function attachJurnalPagination() {
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
                                attachJurnalPagination();

                                const headerElement = document.getElementById('daftar-jurnal');
                                if (headerElement) {
                                    headerElement.scrollIntoView({
                                        behavior: 'smooth'
                                    });
                                }
                            })
                            .catch(err => {
                                console.error('Pagination error:', err);
                                window.location.href = targetUrl.toString();
                            });
                    });
                });
            }

            attachJurnalPagination();

            window.clearJurnalSearch = function() {
                input.value = '';
                if (clearBtn) {
                    clearBtn.classList.add('hidden');
                    clearBtn.classList.remove('inline-flex');
                }
                clearTimeout(debounceTimer);
                fetchJurnals('');
                input.focus();
            };
        });
    </script>
@endpush
