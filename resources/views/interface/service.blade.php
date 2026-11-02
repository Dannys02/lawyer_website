@extends('interface.layout.app')
@section('title', 'Layanan Hukum Unggulan | Pengacara Banyuwangi Safi')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="service-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Layanan Kami</span>
                </nav>

                <p
                    class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    KOMPETENSI &amp; SPESIALISASI
                </p>
                <h1 id="service-heading"
                    class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-4">
                    Layanan Hukum <span class="text-ns-gold-400">Unggulan</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Pendampingan komprehensif di jalur pengadilan (litigasi) maupun penyelesaian sengketa di luar pengadilan
                    (non-litigasi) dengan struktur penanganan yang terukur.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Practice Areas / Layanan Hukum Unggulan =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-layanan"
        aria-labelledby="layanan-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6 mb-10 sm:mb-12 pb-6 border-b border-ns-border-light">
                <div>
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Kompetensi &amp; Spesialisasi</span>
                    </div>
                    <h2 id="layanan-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Layanan Hukum Unggulan
                    </h2>
                </div>
                <p class="text-sm sm:text-base text-ns-ink-700 max-w-xl leading-relaxed m-0">
                    Pendampingan komprehensif di jalur pengadilan (litigasi) maupun penyelesaian sengketa di luar pengadilan
                    (non-litigasi) dengan struktur penanganan yang terukur.
                </p>
            </div>

            <!-- Practice Grid Dinamis dari Database (Table: services) - 3 Kolom Sejajar -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse ($services as $index => $item)
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl">
                        <div class="relative h-48 sm:h-52 bg-ns-navy-800">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Ilustrasi {{ $item->title }}"
                                width="480" height="320" loading="lazy" decoding="async"
                                class="w-full h-full object-cover">
                            <span
                                class="absolute top-3 left-3 bg-ns-navy-900 text-ns-gold-400 border border-ns-gold-400 font-display font-bold text-xs px-2.5 py-1 rounded"
                                aria-hidden="true">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1.5">Bidang Praktik
                            </div>
                            <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-3">{{ $item->title }}</h3>
                            <div class="text-sm text-ns-ink-700 leading-relaxed flex-1 service-rich-desc">
                                {!! $item->description !!}
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full max-w-2xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="lnr lnr-briefcase"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Data Layanan Hukum Sedang Diperbarui
                        </h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                            Daftar spesialisasi dan bidang praktik hukum sedang disinkronkan dari database kantor kami.
                        </p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center min-h-[48px] px-7 py-3 bg-ns-navy-900 text-ns-light-100 font-bold text-sm tracking-wide rounded hover:bg-ns-navy-800 transition">
                            Hubungi Kantor Kami
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--================ End Practice Areas =================-->

    <!--================ Start Why Choose Us & Client Segmentation (Deep Navy Authority) =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-navy-900 text-ns-light-100 border-t-4 border-b-4 border-ns-gold-500"
        aria-labelledby="keunggulan-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                <!-- Left Column: Reasons -->
                <div class="lg:col-span-6">
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                        <span>Komitmen &amp; Standar Layanan</span>
                    </div>
                    <h2 id="keunggulan-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-light-100 mb-4">
                        Alasan Memilih Kami
                    </h2>
                    <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed mb-6">
                        Setiap perkara membutuhkan ketepatan strategi dan kejelasan komunikasi. Kami memastikan setiap
                        langkah hukum terukur dan dapat dipertanggungjawabkan secara profesional.
                    </p>

                    <ul class="space-y-3.5 list-none p-0 m-0">
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Pendampingan Tajam, Solutif
                                    &amp; Strategis</strong>
                                <span class="block text-xs sm:text-sm text-ns-light-300 leading-relaxed">Merumuskan
                                    konstruksi hukum yang tepat sasaran sesuai duduk perkara.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Tim Profesional Berdedikasi
                                    Tinggi</strong>
                                <span class="block text-xs sm:text-sm text-ns-light-300 leading-relaxed">Dukungan advokat
                                    dan konsultan yang kompeten di bidangnya.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Transparansi Biaya &amp;
                                    Progres Perkara</strong>
                                <span class="block text-xs sm:text-sm text-ns-light-300 leading-relaxed">Laporan
                                    perkembangan penanganan perkara disampaikan secara berkala.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Pendekatan Humanis pada
                                    Perkara Keluarga &amp; Waris</strong>
                                <span class="block text-xs sm:text-sm text-ns-light-300 leading-relaxed">Mengutamakan
                                    martabat dan ketenangan para pihak dalam sengketa sensitif.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Penguatan Kesadaran Hukum
                                    Masyarakat</strong>
                                <span class="block text-xs sm:text-sm text-ns-light-300 leading-relaxed">Aktif memberikan
                                    edukasi hukum publik yang mencerdaskan.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Right Column: Client Segmentation & Mosaic Gallery -->
                <div class="lg:col-span-6 space-y-6">
                    <div
                        class="bg-ns-navy-800 border border-ns-gold-400/40 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-7 shadow-xl">
                        <h3 class="font-display font-bold text-xl text-ns-light-100 mb-1.5">Segmentasi Klien</h3>
                        <p class="text-xs sm:text-sm text-ns-light-300 leading-relaxed mb-4">
                            Kami melayani spektrum klien yang luas dengan pendekatan personal dan profesional:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <div class="bg-ns-navy-900 border border-white/10 p-3 rounded flex items-center gap-3">
                                <span class="font-display font-bold text-xs text-ns-gold-400">01</span>
                                <span class="text-xs font-semibold text-ns-light-100">Perorangan dan Keluarga</span>
                            </div>
                            <div class="bg-ns-navy-900 border border-white/10 p-3 rounded flex items-center gap-3">
                                <span class="font-display font-bold text-xs text-ns-gold-400">02</span>
                                <span class="text-xs font-semibold text-ns-light-100">UMKM &amp; Bisnis Rintisan</span>
                            </div>
                            <div class="bg-ns-navy-900 border border-white/10 p-3 rounded flex items-center gap-3">
                                <span class="font-display font-bold text-xs text-ns-gold-400">03</span>
                                <span class="text-xs font-semibold text-ns-light-100">Perusahaan Swasta &amp;
                                    Korporasi</span>
                            </div>
                            <div class="bg-ns-navy-900 border border-white/10 p-3 rounded flex items-center gap-3">
                                <span class="font-display font-bold text-xs text-ns-gold-400">04</span>
                                <span class="text-xs font-semibold text-ns-light-100">Instansi Pemerintah &amp;
                                    BUMDes</span>
                            </div>
                            <div
                                class="sm:col-span-2 bg-ns-navy-900 border border-white/10 p-3 rounded flex items-center gap-3">
                                <span class="font-display font-bold text-xs text-ns-gold-400">05</span>
                                <span class="text-xs font-semibold text-ns-light-100">Lembaga Pendidikan, Yayasan, &amp;
                                    Organisasi Sosial</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mosaic Gallery (Dokumentasi Aktivitas Kantor Hukum) -->
                    <div class="grid grid-cols-2 gap-3" aria-label="Dokumentasi Aktivitas Kantor Hukum">
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ asset('interface/img/service/service4.jpg') }}" alt="Pendampingan hukum klien 1"
                                width="280" height="200" loading="lazy" decoding="async"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ asset('interface/img/service/service5.jpg') }}" alt="Pendampingan hukum klien 2"
                                width="280" height="200" loading="lazy" decoding="async"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ asset('interface/img/service/service6.jpg') }}" alt="Diskusi strategi hukum 3"
                                width="280" height="200" loading="lazy" decoding="async"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ asset('interface/img/service/service7.jpg') }}" alt="Konsultasi kantor hukum 4"
                                width="280" height="200" loading="lazy" decoding="async"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Why Choose Us Area =================-->

    <!--================ Start Consultation CTA Banner Area =================-->
    <section class="py-16 sm:py-20 bg-ns-ivory border-b border-ns-border-light text-center" aria-labelledby="cta-heading">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block w-10 h-0.5 bg-ns-gold-500 mb-3" aria-hidden="true"></span>
            <h2 id="cta-heading" class="font-display font-bold text-2xl sm:text-3xl md:text-4xl text-ns-ink-900 mb-4">
                Butuh Bantuan atau Pendampingan Hukum?
            </h2>
            <p class="text-sm sm:text-base text-ns-ink-700 leading-relaxed max-w-2xl mx-auto mb-8">
                Konsultasikan situasi dan perkara Anda bersama tim advokat profesional kami. Kami siap memberikan telaah
                hukum awal serta strategi penyelesaian yang tepat sasaran.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-ns-navy-900 text-ns-light-100 font-bold text-sm tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-800 hover:text-ns-gold-400 hover:border-ns-gold-400 transition-all duration-150 shadow-md">
                    Jadwalkan Konsultasi Sekarang
                </a>
                <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 min-h-[48px] px-8 py-3 bg-ns-gold-400 text-ns-navy-900 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-white hover:border-white transition-all duration-150 shadow-md">
                    <i class="fab fa-whatsapp text-base" aria-hidden="true"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </section>
    <!--================ End Consultation CTA Banner Area =================-->
@endsection
