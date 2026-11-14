@extends('interface.layout.app')
@section('title', $service->title . ' | Layanan Hukum Pengacara Banyuwangi Safi')

@php
    $metaDescription = Str::limit(trim(strip_tags($service->description)), 160);
    $metaImage = !empty($service->image) ? asset('storage/' . $service->image) : asset('interface/img/LOGO_NS_2.png');
@endphp

@push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Kantor Hukum Nurul Safii &amp; Partners">
    <meta property="og:title" content="{{ $service->title }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $service->title }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">
@endpush

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-14 sm:pb-16 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="service-detail-heading">
        <!-- Background Media with Gradient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
            <picture>
                <source srcset="{{ asset('interface/img/pengadilan.webp') }}" type="image/webp">
                <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt="" width="1920" height="1280"
                    class="w-full h-full object-cover object-center opacity-15" fetchpriority="high">
            </picture>
            <div class="absolute inset-0 bg-gradient-to-r from-ns-navy-950/95 via-ns-navy-900/90 to-ns-navy-800/85"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-ns-light-300 mb-4 flex-wrap"
                aria-label="Breadcrumb">
                <a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors">Home</a>
                <span class="text-ns-gold-400">&bull;</span>
                <a href="{{ route('service') }}" class="hover:text-ns-gold-400 transition-colors">Layanan Hukum</a>
                <span class="text-ns-gold-400">&bull;</span>
                <span class="text-ns-gold-400 truncate max-w-[200px] sm:max-w-xs"
                    aria-current="page">{{ $service->title }}</span>
            </nav>

            <div
                class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-3">
                <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                BIDANG PRAKTIK &amp; SPESIALISASI
            </div>

            <h1 id="service-detail-heading"
                class="font-serif font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-ns-light-100 leading-tight tracking-tight mb-4">
                {{ $service->title }}
            </h1>

            <p class="text-xs sm:text-sm text-ns-light-300 leading-relaxed max-w-2xl">
                Pendampingan hukum profesional dan terstruktur oleh tim advokat Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp; Partners.
            </p>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Service Detail & Sidebar Section =================-->
    <section class="py-14 sm:py-18 lg:py-20 bg-ns-paper border-b border-ns-border-light">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Main Detail Content (Col 8) -->
                <main class="lg:col-span-8">
                    <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-9 shadow-sm">
                        <!-- Featured Image -->
                        @if (!empty($service->image))
                            <div class="relative rounded-lg overflow-hidden border border-ns-border-light bg-ns-navy-950 mb-7">
                                <img src="{{ asset('storage/' . $service->image) }}"
                                    alt="Layanan {{ $service->title }}"
                                    width="800" height="450"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif

                        <!-- Service Title Header -->
                        <div class="pb-5 mb-6 border-b border-ns-border-light">
                            <h2 class="font-display font-bold text-xl sm:text-2xl text-ns-ink-900 mt-2 mb-0">
                                {{ $service->title }}
                            </h2>
                        </div>

                        <!-- Rich Text Description Content -->
                        <div class="service-detail-content text-sm sm:text-base text-ns-ink-800 leading-relaxed space-y-4">
                            {!! $service->description !!}
                        </div>

                        <!-- Consultation Prompt Callout -->
                        <div class="mt-8 pt-6 border-t border-ns-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-ns-ivory p-5 rounded-lg border border-[#C8C4BC]">
                            <div>
                                <h3 class="font-display font-bold text-sm sm:text-base text-ns-ink-900 mb-1">
                                    Memerlukan Pendampingan di Bidang Ini?
                                </h3>
                                <p class="text-xs text-ns-ink-600 m-0 leading-relaxed">
                                    Konsultasikan masalah hukum Anda langsung bersama tim advokat kami.
                                </p>
                            </div>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center shrink-0 min-h-[44px] px-5 py-2.5 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-ns-navy-900 hover:text-white transition shadow-sm">
                                <span>Hubungi Kantor</span>
                                <span class="ml-1.5" aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </article>
                </main>

                <!-- Sidebar (Col 4) -->
                <aside class="lg:col-span-4 space-y-6">
                    <!-- CTA Card -->
                    <div class="bg-ns-navy-900 text-ns-light-100 border-2 border-ns-gold-400/40 rounded-lg p-6 shadow-md text-center">
                        <div class="w-12 h-12 rounded-full bg-ns-gold-400 text-ns-navy-950 inline-flex items-center justify-center text-xl mb-3 shadow">
                            <i class="fas fa-phone-alt" aria-hidden="true"></i>
                        </div>
                        <h3 class="font-display font-bold text-base sm:text-lg text-ns-light-100 mb-2">
                            Konsultasi Hukum Resmi
                        </h3>
                        <p class="text-xs text-ns-light-300 leading-relaxed mb-5">
                            Jadwalkan konsultasi perkara litigasi maupun non-litigasi dengan kerahasiaan dan kepastian langkah hukum.
                        </p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center w-full min-h-[44px] px-5 py-2.5 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-white hover:text-ns-navy-900 transition shadow-sm">
                            Konsultasi Sekarang
                        </a>
                    </div>

                    <!-- Other Services Recommendations -->
                    @if ($otherServices->count() > 0)
                        <div class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 shadow-sm">
                            <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">
                                Spesialisasi Lainnya
                            </div>
                            <h2 class="font-display font-bold text-base text-ns-ink-900 pb-3 mb-4 border-b border-ns-border-light">
                                Layanan Hukum Terkait
                            </h2>

                            <div class="space-y-3.5">
                                @foreach ($otherServices as $other)
                                    <article class="flex gap-3 pb-3 border-b border-ns-border-light/70 last:border-0 last:pb-0 group">
                                        @if (!empty($other->image))
                                            <div class="w-16 h-14 shrink-0 rounded overflow-hidden bg-ns-navy-900 border border-ns-border-light">
                                                <img src="{{ asset('storage/' . $other->image) }}" alt=""
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-display font-bold text-xs sm:text-sm text-ns-ink-900 leading-snug line-clamp-2">
                                                <a href="{{ route('service.show', $other->id) }}"
                                                    class="hover:text-ns-gold-700 transition-colors">
                                                    {{ $other->title }}
                                                </a>
                                            </h3>
                                            <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-ns-gold-700 mt-1">
                                                <span>Lihat Detail</span>
                                                <span aria-hidden="true">&rarr;</span>
                                            </span>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                            <div class="mt-5 pt-4 border-t border-ns-border-light text-center">
                                <a href="{{ route('service') }}"
                                    class="inline-flex items-center gap-1 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                    <span>Lihat Semua Layanan &rarr;</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </aside>

            </div>
        </div>
    </section>
    <!--================ End Service Detail Section =================-->
@endsection

@push('styles')
<style>
    /* Styling for Summernote / HTML content inside service detail */
    .service-detail-content {
        line-height: 1.8;
    }
    .service-detail-content ol {
        list-style-type: decimal;
        margin-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        padding-left: 0.5rem;
    }
    .service-detail-content ul {
        list-style-type: disc;
        margin-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        padding-left: 0.5rem;
    }
    .service-detail-content li {
        margin-bottom: 0.5rem;
        padding-left: 0.25rem;
    }
    .service-detail-content p {
        margin-bottom: 0.75rem;
    }
</style>
@endpush
