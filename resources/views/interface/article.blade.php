@extends('interface.layout.app')
@section('title', 'Artikel & Legal Opini | Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500" aria-labelledby="article-banner-heading">
        <!-- Background Media with Gradient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
            <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt="" class="w-full h-full object-cover object-center opacity-15" fetchpriority="high">
            <div class="absolute inset-0 bg-gradient-to-r from-ns-navy-950/95 via-ns-navy-900/90 to-ns-navy-800/85"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
            <div class="max-w-3xl">
                <!-- Breadcrumbs -->
                <nav class="flex items-center justify-center sm:justify-start gap-2 text-xs font-semibold uppercase tracking-widest text-ns-light-300 mb-4" aria-label="Breadcrumb">
                    <a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors">Home</a>
                    <span class="text-ns-gold-400">&bull;</span>
                    <span class="text-ns-gold-400" aria-current="page">Artikel Terbaru</span>
                </nav>

                <p class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    KAJIAN, ANALISIS &amp; LEGAL OPINI
                </p>
                <h1 id="article-banner-heading" class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Artikel &amp; <span class="text-ns-gold-400">Legal Opini</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Kumpulan pandangan yuridis, analisis kasus kontemporer, dan edukasi hukum kritis dari Nurul Safii, S.H., M.H., C.MSP dan tim advokat untuk mencerahkan masyarakat.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Articles Grid Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-artikel" aria-labelledby="article-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Debounced Search Input Bar -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 pb-6 border-b border-ns-border-light">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Publikasi Ilmiah &amp; Gagasan Yuridis</span>
                    </div>
                    <h2 id="article-heading" class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Artikel Terbaru dari Kami
                    </h2>
                </div>

                <!-- Modern Search Bar with Debounce Indicator -->
                <div class="w-full lg:w-96 flex-shrink-0">
                    <form id="article-search-form" action="{{ route('article') }}" method="GET" onsubmit="return false;" class="relative">
                        <label for="article-search-input" class="sr-only">Cari artikel atau legal opini</label>
                        <div class="relative flex items-center">
                            <!-- Search Icon -->
                            <span class="absolute left-3.5 text-ns-ink-500 pointer-events-none text-sm">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>

                            <!-- Text Input -->
                            <input type="text"
                                   id="article-search-input"
                                   name="search"
                                   value="{{ $search ?? '' }}"
                                   placeholder="Cari artikel, topik, atau kata kunci hukum..."
                                   autocomplete="off"
                                   class="w-full pl-10 pr-20 py-3 bg-white text-sm text-ns-ink-900 placeholder:text-ns-ink-500 border-2 border-ns-border-light rounded-lg focus:outline-none focus:border-ns-gold-500 focus:ring-1 focus:ring-ns-gold-500 shadow-sm transition">

                            <!-- Clear & Loading Indicators Container -->
                            <div class="absolute right-3 flex items-center gap-2">
                                <!-- Loading Spinner (hidden by default) -->
                                <div id="search-spinner" class="hidden text-ns-gold-700 animate-spin text-sm" title="Mencari...">
                                    <i class="fas fa-circle-notch" aria-hidden="true"></i>
                                </div>

                                <!-- Clear Button -->
                                <button type="button"
                                        id="search-clear-btn"
                                        onclick="clearSearchInput()"
                                        class="{{ empty($search) ? 'hidden' : 'inline-flex' }} items-center justify-center w-6 h-6 text-xs text-ns-ink-500 hover:text-ns-navy-900 hover:bg-ns-paper rounded-full transition"
                                        aria-label="Hapus kata kunci pencarian">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-[11px] text-ns-ink-500 mt-1.5 px-1">
                            <span id="search-status-text">
                                @if(!empty($search))
                                    Hasil untuk: &ldquo;<strong class="text-ns-navy-900">{{ $search }}</strong>&rdquo;
                                @else
                                    Ketik untuk mencari otomatis (debounce 400ms)
                                @endif
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dynamic Container (Replaced via AJAX or rendered directly) -->
            <div id="articles-container" class="transition-opacity duration-200">
                @include('interface.article-list-partial')
            </div>
        </div>
    </section>
    <!--================ End Articles Grid Section =================-->

    <!--================ Start Legal Consultation Banner =================-->
    <section class="py-14 sm:py-16 bg-ns-navy-950 text-ns-light-100 border-t-2 border-ns-gold-500 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="font-serif font-bold text-2xl sm:text-3xl text-ns-light-100 mb-3">
                Menghadapi Permasalahan Hukum Terkait Topik di Atas?
            </h2>
            <p class="text-sm sm:text-base text-ns-light-300 max-w-2xl mx-auto mb-8 leading-relaxed">
                Dapatkan kajian yuridis objektif dan telaah mendalam atas kedudukan hukum perkara Anda bersama Kantor Hukum Nurul Safii &amp; Partners.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-ns-gold-400 text-ns-navy-950 font-bold text-sm tracking-wide rounded hover:bg-white transition-all duration-150 shadow-lg">
                    Konsultasikan Perkara Anda
                </a>
                <a href="{{ route('service') }}" class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-transparent text-ns-light-100 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-ns-navy-900 hover:border-white transition-all duration-150">
                    Lihat Bidang Layanan Kami
                </a>
            </div>
        </div>
    </section>
    <!--================ End Legal Consultation Banner =================-->
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('article-search-input');
        const spinner = document.getElementById('search-spinner');
        const clearBtn = document.getElementById('search-clear-btn');
        const statusText = document.getElementById('search-status-text');
        const container = document.getElementById('articles-container');

        if (!input || !container) return;

        let debounceTimer = null;
        let currentAbortController = null;

        // Custom Debounce Function (400ms delay agar request ringan saat mengetik kalimat panjang)
        input.addEventListener('input', function () {
            const query = input.value.trim();

            // Toggle Clear Button
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
                fetchArticles(query);
            }, 400);
        });

        // Fetch articles via AJAX with AbortController to cancel superseded requests
        function fetchArticles(keyword) {
            if (currentAbortController) {
                currentAbortController.abort();
            }
            currentAbortController = new AbortController();

            if (spinner) spinner.classList.remove('hidden');
            if (statusText) {
                statusText.innerHTML = keyword
                    ? `Mencari &ldquo;<strong class="text-ns-navy-900">${keyword}</strong>&rdquo;...`
                    : 'Memuat seluruh artikel...';
            }
            container.style.opacity = '0.6';

            const url = new URL("{{ route('article') }}", window.location.origin);
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
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.text();
            })
            .then(html => {
                container.innerHTML = html;
                container.style.opacity = '1';
                if (spinner) spinner.classList.add('hidden');

                if (statusText) {
                    statusText.innerHTML = keyword
                        ? `Hasil untuk: &ldquo;<strong class="text-ns-navy-900">${keyword}</strong>&rdquo;`
                        : 'Ketik untuk mencari otomatis (debounce 400ms)';
                }

                // Update browser URL without reloading
                window.history.replaceState({}, '', url.toString());

                // Re-bind pagination links inside container for AJAX navigation
                attachPaginationEvents();
            })
            .catch(err => {
                if (err.name !== 'AbortError') {
                    console.error('Fetch error:', err);
                    if (spinner) spinner.classList.add('hidden');
                    container.style.opacity = '1';
                    if (statusText) {
                        statusText.innerHTML = '<span class="text-red-600">Gagal memuat data pencarian.</span>';
                    }
                }
            });
        }

        // Attach AJAX behavior to pagination links so navigation remains seamless
        function attachPaginationEvents() {
            const paginationLinks = container.querySelectorAll('a[href*="page="]');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (e) {
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
                        attachPaginationEvents();

                        // Smooth scroll back to articles header
                        const headerElement = document.getElementById('daftar-artikel');
                        if (headerElement) {
                            headerElement.scrollIntoView({ behavior: 'smooth' });
                        }
                    })
                    .catch(err => {
                        console.error('Pagination fetch error:', err);
                        window.location.href = targetUrl.toString();
                    });
                });
            });
        }

        // Initial bind for pagination
        attachPaginationEvents();

        // Global clear function accessible by onclick
        window.clearSearchInput = function () {
            input.value = '';
            if (clearBtn) {
                clearBtn.classList.add('hidden');
                clearBtn.classList.remove('inline-flex');
            }
            clearTimeout(debounceTimer);
            fetchArticles('');
            input.focus();
        };
    });
</script>
@endpush
