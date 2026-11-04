@extends('interface.layout.app')
@section('title', $article->title . ' | Pengacara Banyuwangi Safi')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-14 sm:pb-16 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="article-detail-heading">
        <!-- Background Media with Gradient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
            <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt=""
                class="w-full h-full object-cover object-center opacity-15" fetchpriority="high">
            <div class="absolute inset-0 bg-gradient-to-r from-ns-navy-950/95 via-ns-navy-900/90 to-ns-navy-800/85"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-ns-light-300 mb-4 flex-wrap"
                aria-label="Breadcrumb">
                <a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors">Home</a>
                <span class="text-ns-gold-400">&bull;</span>
                <a href="{{ route('article') }}" class="hover:text-ns-gold-400 transition-colors">Artikel &amp; Legal
                    Opini</a>
                <span class="text-ns-gold-400">&bull;</span>
                <span class="text-ns-gold-400 truncate max-w-[200px] sm:max-w-xs"
                    aria-current="page">{{ $article->title }}</span>
            </nav>

            <div
                class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-3">
                <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                KAJIAN HUKUM &amp; LEGAL OPINI
            </div>

            <h1 id="article-detail-heading"
                class="font-serif font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-ns-light-100 leading-tight tracking-tight mb-6">
                {{ $article->title }}
            </h1>

            <!-- Meta details row -->
            <div
                class="flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-sm text-ns-light-300 border-t border-ns-navy-800 pt-4">
                <div class="flex items-center gap-2">
                    <span
                        class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                        <i class="fas fa-user-tie" aria-hidden="true"></i>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Penulis</span>
                        <span
                            class="font-semibold text-ns-light-100">{{ $article->author ?? 'Nurul Safii, S.H., M.H., C.MSP' }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span
                        class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Tanggal Terbit</span>
                        <time datetime="{{ \Carbon\Carbon::parse($article->date_publish)->format('Y-m-d') }}"
                            class="font-semibold text-ns-light-100">
                            {{ \Carbon\Carbon::parse($article->date_publish)->format('d F Y') }}
                        </time>
                    </div>
                </div>

                @if (!empty($article->views))
                    <div class="flex items-center gap-2">
                        <span
                            class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                            <i class="far fa-eye" aria-hidden="true"></i>
                        </span>
                        <div>
                            <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Dibaca</span>
                            <span class="font-semibold text-ns-light-100">{{ number_format($article->views) }} kali</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Article Content & Sidebar Section =================-->
    <section class="py-14 sm:py-18 lg:py-20 bg-ns-paper">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
                <!-- Main Article Content (Col 8) -->
                <main class="lg:col-span-8">
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-gold-500 rounded-lg p-6 sm:p-10 shadow-sm">
                        <!-- Featured Image -->
                        @if (!empty($article->picture))
                            <div
                                class="mb-8 rounded-lg overflow-hidden bg-ns-navy-950 border border-ns-border-light shadow-md">
                                <img src="{{ asset('storage/' . $article->picture) }}" alt="Gambar {{ $article->title }}"
                                    width="900" height="500"
                                    class="w-full h-auto max-h-[500px] object-cover object-center">
                            </div>
                        @endif

                        <!-- Article Rich Text Body -->
                        <div class="article-rich-content">
                            {!! $article->text !!}
                        </div>

                        <!-- Article Footer: Author Signature Box -->
                        <div
                            class="mt-10 pt-6 border-t-2 border-ns-border-light flex flex-col sm:flex-row items-center sm:items-start gap-5 bg-ns-ivory p-6 rounded-lg border">
                            <div
                                class="w-16 h-16 rounded-full bg-ns-navy-900 border-2 border-ns-gold-400 flex-shrink-0 flex items-center justify-center text-ns-gold-400 text-2xl shadow">
                                <i class="fas fa-balance-scale" aria-hidden="true"></i>
                            </div>
                            <div class="text-center sm:text-left flex-1">
                                <div class="text-xs font-bold uppercase tracking-wider text-ns-gold-700 mb-1">Kantor Hukum
                                    Penulis</div>
                                <h2 class="font-serif font-bold text-lg text-ns-ink-900 mb-1">
                                    {{ $article->author ?? 'Nurul Safii, S.H., M.H., C.MSP & Partners' }}
                                </h2>
                                <p class="text-xs sm:text-sm text-ns-ink-700 leading-relaxed mb-3">
                                    Advokat, Konsultan Hukum, Kurator &amp; Mediator bersumpah Pengadilan Tinggi yang
                                    berfokus pada litigasi dan non-litigasi.
                                </p>
                                <a href="{{ route('contact') }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                    <span>Konsultasikan Masalah Hukum Anda Bersama Penulis</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>

                        <!-- Back to Index Button -->
                        <div
                            class="mt-8 flex items-center justify-between pt-4 border-t border-ns-border-light flex-wrap gap-4">
                            <a href="{{ route('article') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wider rounded hover:bg-ns-navy-800 transition">
                                &larr; Kembali ke Daftar Artikel
                            </a>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-ns-navy-900 hover:text-ns-light-100 transition shadow">
                                Hubungi Kantor Hukum Kami
                            </a>
                        </div>
                    </article>
                </main>

                <!-- Sidebar (Col 4) -->
                <aside class="lg:col-span-4 space-y-8">
                    <!-- Quick Consultation Box -->
                    <div
                        class="bg-ns-navy-900 text-ns-light-100 border border-ns-navy-800 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-7 shadow-lg">
                        <div
                            class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                            <span>Bantuan Hukum Segera</span>
                        </div>
                        <h2 class="font-serif font-bold text-xl text-ns-light-100 mb-3">
                            Konsultasi Perkara Anda
                        </h2>
                        <p class="text-xs sm:text-sm text-ns-light-300 leading-relaxed mb-6">
                            Menghadapi sengketa atau perkara hukum serupa? Dapatkan analisis yuridis yang objektif dan
                            tindakan hukum yang terukur.
                        </p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center w-full min-h-[46px] px-6 py-3 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-white transition shadow-md">
                            Jadwalkan Konsultasi Sekarang
                        </a>
                    </div>

                    <!-- Recent / Related Articles List -->
                    <div class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 shadow-sm">
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">
                            Arsip &amp; Rekomendasi
                        </div>
                        <h2
                            class="font-display font-bold text-lg text-ns-ink-900 pb-4 mb-4 border-b border-ns-border-light">
                            Artikel Hukum Lainnya
                        </h2>

                        <div class="space-y-4">
                            @foreach ($recentArticles as $recent)
                                <article
                                    class="flex gap-3 pb-4 border-b border-ns-border-light/70 last:border-0 last:pb-0 group">
                                    @if (!empty($recent->picture))
                                        <div
                                            class="w-18 h-16 sm:w-20 sm:h-18 flex-shrink-0 rounded overflow-hidden bg-ns-navy-900">
                                            <img src="{{ asset('storage/' . $recent->picture) }}" alt=""
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-1.5 text-[11px] mb-1">
                                            <time
                                                datetime="{{ \Carbon\Carbon::parse($recent->date_publish)->format('Y-m-d') }}"
                                                class="font-semibold text-ns-gold-700">
                                                {{ \Carbon\Carbon::parse($recent->date_publish)->format('d M Y') }}
                                            </time>
                                            <span class="text-ns-border-light">&bull;</span>
                                            <span class="text-ns-ink-500 inline-flex items-center gap-1">
                                                <i class="far fa-eye text-ns-gold-700 text-[10px]"></i>
                                                {{ number_format($recent->views ?? 0) }}x
                                            </span>
                                        </div>
                                        <h3
                                            class="font-display font-bold text-xs sm:text-sm text-ns-ink-900 leading-snug line-clamp-2">
                                            <a href="{{ route('article.show', $recent->slug) }}"
                                                class="hover:text-ns-gold-700 transition-colors">
                                                {{ $recent->title }}
                                            </a>
                                        </h3>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-6 pt-4 border-t border-ns-border-light text-center">
                            <a href="{{ route('article') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                <span>Lihat Seluruh Artikel &rarr;</span>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!--================ End Article Content & Sidebar Section =================-->
@endsection
