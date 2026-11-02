@extends('interface.layout.app')
@section('title', 'Jurnal & Publikasi Hukum | Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500" aria-labelledby="jurnal-banner-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Jurnal Hukum</span>
                </nav>

                <p class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    ARSIP &amp; PUBLIKASI AKADEMIK
                </p>
                <h1 id="jurnal-banner-heading" class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Jurnal &amp; <span class="text-ns-gold-400">Riset Hukum</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Koleksi karya tulis ilmiah, riset doktrinal, dan dokumen telaah hukum dari Kantor Hukum Nurul Safii &amp; Partners yang dapat diakses dan diunduh sebagai referensi akademis maupun praktis.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Jurnals Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-jurnal" aria-labelledby="jurnal-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header & Filter / Search Form -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12 pb-6 border-b border-ns-border-light">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Literatur &amp; Dokumen Ilmiah</span>
                    </div>
                    <h2 id="jurnal-heading" class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Jurnal Kami
                    </h2>
                    <p class="text-sm sm:text-base text-ns-ink-700 mt-2 leading-relaxed">
                        Unduh atau tinjau langsung berkas jurnal riset hukum dalam format dokumen PDF resmi.
                    </p>
                </div>

                <!-- Search Input Form -->
                <div class="w-full lg:w-80 flex-shrink-0">
                    <form action="{{ route('file') }}" method="GET" class="relative">
                        <label for="jurnal-search-input" class="sr-only">Cari judul atau topik jurnal</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-ns-ink-500 pointer-events-none text-sm">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                            <input type="text"
                                   id="jurnal-search-input"
                                   name="search"
                                   value="{{ $search ?? '' }}"
                                   placeholder="Cari jurnal atau kata kunci..."
                                   class="w-full pl-10 pr-10 py-2.5 bg-white text-sm text-ns-ink-900 placeholder:text-ns-ink-500 border-2 border-ns-border-light rounded-lg focus:outline-none focus:border-ns-gold-500 focus:ring-1 focus:ring-ns-gold-500 shadow-sm transition">
                            @if(!empty($search))
                                <a href="{{ route('file') }}"
                                   class="absolute right-3 inline-flex items-center justify-center w-5 h-5 text-xs text-ns-ink-500 hover:text-ns-navy-900 transition"
                                   title="Reset Pencarian">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Grid 3 Kolom Sejajar Konsisten -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse ($file as $index => $row)
                    <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
                        <!-- Thumbnail Media -->
                        <div class="relative bg-ns-navy-950 aspect-[16/10] overflow-hidden">
                            @if (!empty($row->thumbnail))
                                <img src="{{ asset('storage/' . $row->thumbnail) }}"
                                     alt="Sampul Jurnal {{ $row->title }}"
                                     width="540" height="340"
                                     loading="lazy" decoding="async"
                                     class="w-full h-full object-cover object-top filter brightness-95 group-hover:scale-105 group-hover:brightness-100 transition-all duration-500">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-ns-navy-900 text-ns-gold-400 p-6 text-center">
                                    <i class="fas fa-book-open text-4xl mb-2 opacity-80" aria-hidden="true"></i>
                                    <span class="text-xs font-semibold uppercase tracking-wider text-ns-light-300">Dokumen Jurnal</span>
                                </div>
                            @endif

                            <!-- Index Badge -->
                            <span class="absolute top-3 left-3 bg-ns-navy-950/90 text-ns-gold-400 border border-ns-gold-400/60 font-display font-bold text-xs px-2.5 py-1 rounded backdrop-blur-sm shadow-md" aria-hidden="true">
                                {{ sprintf('%02d', ($file->currentPage() - 1) * $file->perPage() + $index + 1) }}
                            </span>

                            <!-- Format Badge -->
                            <span class="absolute top-3 right-3 bg-ns-gold-400 text-ns-navy-950 font-sans font-bold text-[10px] uppercase tracking-wider px-2.5 py-1 rounded shadow">
                                <i class="far fa-file-pdf mr-1" aria-hidden="true"></i> PDF
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex flex-col flex-1 bg-white">
                            <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1.5">
                                Publikasi Ilmiah
                            </div>
                            <h3 class="font-display font-bold text-lg text-ns-ink-900 leading-snug mb-3">
                                {{ $row->title }}
                            </h3>

                            <div class="text-sm text-ns-ink-700 leading-relaxed flex-1 mb-5 line-clamp-3">
                                {{ $row->description }}
                            </div>

                            <!-- Action Buttons: Lihat File & Unduh PDF -->
                            <div class="pt-4 border-t border-ns-border-light flex items-center justify-between gap-3">
                                <a href="{{ asset('storage/' . $row->pdf_file) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-ns-paper text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded border border-[#C8C4BC] hover:bg-ns-navy-900 hover:text-ns-light-100 hover:border-ns-navy-900 transition flex-1 text-center">
                                    <i class="far fa-eye" aria-hidden="true"></i>
                                    <span>Lihat File</span>
                                </a>

                                <a href="{{ route('download-pdf', $row->id) }}"
                                   class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-ns-navy-900 hover:text-ns-gold-400 transition flex-1 text-center shadow-sm">
                                    <i class="fas fa-download" aria-hidden="true"></i>
                                    <span>Unduh PDF</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4" aria-hidden="true">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">
                            @if(!empty($search))
                                Jurnal Tidak Ditemukan
                            @else
                                Kami belum memiliki Jurnal
                            @endif
                        </h4>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                            @if(!empty($search))
                                Pencarian dengan kata kunci <span class="font-bold text-ns-navy-900">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan dokumen jurnal.
                            @else
                                Berkas jurnal dan publikasi riset hukum sedang dalam proses sinkronisasi dan penataan oleh divisi literatur kami. Anda dapat membaca artikel atau legal opini kami.
                            @endif
                        </p>
                        @if(!empty($search))
                            <a href="{{ route('file') }}" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                                Reset Pencarian
                            </a>
                        @else
                            <div class="flex flex-wrap justify-center gap-3">
                                <a href="{{ route('article') }}" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                                    Baca Legal Opini
                                </a>
                                <a href="{{ route('welcome') }}" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-transparent text-ns-navy-900 font-bold text-xs uppercase tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-900 hover:text-ns-light-100 transition">
                                    Kembali ke Beranda
                                </a>
                            </div>
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination Bar -->
            @if ($file->hasPages())
                <div class="mt-12 sm:mt-16 pt-8 border-t border-ns-border-light">
                    {{ $file->links('interface.layout.pagination') }}
                </div>
            @endif
        </div>
    </section>
    <!--================ End Jurnals Section =================-->
@endsection
