@extends('interface.layout.app')
@section('title', 'Pengacara Banyuwangi Safi | Advokat, Mediator & Konsultan Hukum')

@section('content')
    <!--================ Start Home Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 lg:pt-40 pb-16 sm:pb-20 lg:pb-24 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="hero-heading">
        <!-- Background Media with Gradient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
            <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt=""
                class="w-full h-full object-cover object-center opacity-20" fetchpriority="high">
            {{-- <div class="absolute inset-0 bg-gradient-to-r from-ns-navy-950/95 via-ns-navy-900/90 to-ns-navy-800/85"></div> --}}
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Main Hero Copy -->
                <div class="lg:col-span-7">
                    <p
                        class="inline-flex items-center gap-3 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-4 sm:mb-5">
                        <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                        ADVOKAT &middot; MEDIATOR &middot; KONSULTAN HUKUM
                    </p>
                    <h1 id="hero-heading"
                        class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl lg:text-[52px] leading-tight text-ns-light-100 tracking-tight mb-5 sm:mb-6">
                        <span
                            class="block font-display text-base sm:text-lg md:text-xl font-semibold tracking-widest text-ns-light-300 mb-2">KANTOR
                            HUKUM</span>
                        NURUL SAFII, S.H., M.H., C.MSP <span class="text-ns-gold-400">&amp; PARTNERS</span>
                    </h1>
                    <blockquote
                        class="font-serif italic text-lg sm:text-xl md:text-2xl leading-snug text-ns-gold-400 border-l-4 border-ns-gold-400 pl-4 sm:pl-5 my-5">
                        &ldquo;Solusi Hukum Terpercaya, Solusi Tepat Untuk Anda&rdquo;
                    </blockquote>
                    <p class="text-sm sm:text-base leading-relaxed text-ns-light-300 max-w-2xl mb-8">
                        Mendampingi klien perorangan, korporasi, dan institusi dalam menghadapi kompleksitas hukum melalui
                        analisis tajam, strategi litigasi maupun non-litigasi yang terukur, serta integritas profesi yang
                        bermartabat.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center min-h-[48px] px-6 sm:px-7 py-3 bg-ns-gold-400 text-ns-navy-900 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-white hover:border-white transition-all duration-150 shadow-lg">
                            Jadwalkan Konsultasi Hukum
                        </a>
                        <a href="#layanan-hukum"
                            class="inline-flex items-center justify-center min-h-[48px] px-6 sm:px-7 py-3 bg-ns-navy-900/60 text-ns-light-100 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition-all duration-150 backdrop-blur-sm">
                            Telusuri Bidang Praktik
                        </a>
                    </div>
                </div>

                <!-- Credential Card Sidebar -->
                <aside class="lg:col-span-5" aria-label="Identitas dan Fokus Praktik">
                    <div
                        class="bg-ns-navy-800 border border-ns-gold-400/40 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-8 shadow-2xl">
                        <div class="flex items-center gap-4 pb-5 mb-5 border-b border-white/10">
                            <img src="{{ asset('interface/img/LOGO_NS_2.png') }}"
                                alt="Lambang Resmi Kantor Hukum Nurul Safii & Partners" width="72" height="72"
                                class="w-16 h-16 sm:w-18 sm:h-18 object-contain rounded-md bg-ns-navy-900 p-1.5 border border-ns-gold-400/40 flex-shrink-0">
                            <div>
                                <span class="block font-serif italic text-sm text-ns-gold-400 tracking-wide">Officium
                                    Nobile</span>
                                <h2 class="font-display text-lg sm:text-xl font-bold text-ns-light-100 m-0">Pilar Praktik
                                    Utama</h2>
                            </div>
                        </div>

                        <ul class="space-y-3.5 list-none p-0 m-0 mb-6">
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/70 p-3 sm:p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span class="font-serif font-bold text-base text-ns-gold-400 min-w-[20px]">I</span>
                                <div>
                                    <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Litigasi &amp;
                                        Sengketa</strong>
                                    <span class="block text-xs text-ns-light-300 leading-snug">Perdata, Pidana, dan Tata
                                        Usaha Negara</span>
                                </div>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/70 p-3 sm:p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span class="font-serif font-bold text-base text-ns-gold-400 min-w-[20px]">II</span>
                                <div>
                                    <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Korporasi &amp; Hukum
                                        Bisnis</strong>
                                    <span class="block text-xs text-ns-light-300 leading-snug">Kontrak, Artikel Hukumon,
                                        Kepatuhan &amp; Mitigasi Risiko</span>
                                </div>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/70 p-3 sm:p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span class="font-serif font-bold text-base text-ns-gold-400 min-w-[20px]">III</span>
                                <div>
                                    <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Mediasi &amp;
                                        Non-Litigasi</strong>
                                    <span class="block text-xs text-ns-light-300 leading-snug">Penyelesaian Strategis,
                                        Keluarga, Waris &amp; Agraria</span>
                                </div>
                            </li>
                        </ul>

                        <div class="flex items-center gap-2.5 pt-4 border-t border-white/10 text-xs text-ns-light-300">
                            <i class="lnr lnr-map-marker text-ns-gold-400 text-sm" aria-hidden="true"></i>
                            <span>Banyuwangi, Jawa Timur &middot; Melayani Penanganan Perkara Nasional</span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Profile / About Area =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-ivory border-b border-ns-border-light" id="profil-kantor"
        aria-labelledby="profil-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Visual Triptych Split Frame (3 Bagian Terpotong Sejajar Kiri-Kanan & Tengah Agak ke Bawah) -->
                <div class="lg:col-span-5 flex flex-col items-center">
                    <div class="w-full max-w-md">
                        <div
                            class="relative h-64 sm:h-76 md:h-80 rounded-lg overflow-hidden bg-ns-navy-900 border-2 border-ns-gold-500/60 shadow-lg">
                            <div
                                class="flex items-center justify-center">
                                <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Logo Kantor Hukum Nurul Safii"
                                    class="max-w-[200px] sm:max-w-[240px] w-full h-auto object-contain">
                            </div>
                        </div>

                        <!-- Caption / Identitas Pendiri & Managing Partner -->
                        <div
                            class="bg-ns-navy-900 border-2 border-ns-gold-500 rounded-lg p-4 sm:p-5 text-center shadow-lg mt-2">
                            <span class="block text-xs uppercase tracking-widest text-ns-gold-400 mb-1 font-semibold">
                                Pendiri &amp; Managing Partner
                            </span>
                            <strong class="font-display text-base sm:text-lg text-ns-light-100">
                                Nurul Safii, S.H., M.H., C.MSP
                            </strong>
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="lg:col-span-7">
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2.5">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Tentang Firma Kami</span>
                    </div>
                    <h2 id="profil-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-5 leading-tight">
                        Profil Kantor Hukum
                    </h2>
                    <p class="text-base text-ns-ink-700 leading-relaxed mb-4">
                        <strong class="text-ns-ink-900 font-semibold">Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp;
                            Partners</strong> adalah kantor hukum independen yang hadir sebagai representasi integritas,
                        kecermatan, dan keberanian dalam menegakkan keadilan di tengah kompleksitas dinamika hukum.
                    </p>
                    <p class="text-base text-ns-ink-700 leading-relaxed mb-6">
                        Berdiri di atas nilai-nilai luhur profesi hukum, kantor hukum ini didirikan oleh <strong
                            class="text-ns-ink-900 font-semibold">Nurul Safii, S.H., M.H., C.MSP</strong>, seorang advokat
                        sekaligus konsultan strategis yang dikenal atas ketajaman analisis hukumnya dan kepedulian
                        sosialnya. Kami mendampingi klien dalam memitigasi risiko hukum, merumuskan langkah taktis, dan
                        memperjuangkan keadilan secara bermartabat.
                    </p>

                    <!-- Core Value Badges -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 my-7" role="list"
                        aria-label="Nilai Utama Kantor Hukum">
                        <div class="bg-white border border-ns-border-light border-t-4 border-t-ns-navy-900 p-4 rounded"
                            role="listitem">
                            <span class="block font-display font-bold text-base text-ns-ink-900 mb-1">Integritas</span>
                            <span class="block text-xs text-ns-ink-700 leading-relaxed">Kejujuran sebagai fondasi tindakan
                                hukum</span>
                        </div>
                        <div class="bg-white border border-ns-border-light border-t-4 border-t-ns-navy-900 p-4 rounded"
                            role="listitem">
                            <span class="block font-display font-bold text-base text-ns-ink-900 mb-1">Kecermatan</span>
                            <span class="block text-xs text-ns-ink-700 leading-relaxed">Analisis berbasis riset dan
                                ketelitian</span>
                        </div>
                        <div class="bg-white border border-ns-border-light border-t-4 border-t-ns-navy-900 p-4 rounded"
                            role="listitem">
                            <span class="block font-display font-bold text-base text-ns-ink-900 mb-1">Keberanian</span>
                            <span class="block text-xs text-ns-ink-700 leading-relaxed">Ketegasan membela hak hukum
                                klien</span>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center justify-center min-h-[48px] px-7 py-3 bg-ns-navy-900 text-ns-light-100 font-bold text-sm tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-800 hover:text-ns-gold-400 hover:border-ns-gold-400 transition-all duration-150">
                            Pelajari Profil &amp; Visi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Profile / About Area =================-->

    <!--================ Start Practice Areas / Layanan Hukum Unggulan =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="layanan-hukum"
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
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Data Layanan Hukum Sedang
                            Diperbarui</h3>
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

            <div class="mt-10 sm:mt-12 text-center">
                <a href="{{ route('service') }}"
                    class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-ns-navy-900 text-ns-light-100 font-bold text-sm tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-800 hover:text-ns-gold-400 hover:border-ns-gold-400 transition-all duration-150">
                    Lihat Rincian Layanan Hukum
                </a>
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
                        langkah hukum terukur dan dapat dipertanggungjawabkan.
                    </p>

                    <ul class="space-y-3.5 list-none p-0 m-0">
                        <li class="flex items-start gap-3.5 bg-ns-navy-800 border border-ns-gold-400/20 p-4 rounded-lg">
                            <span
                                class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-900 inline-flex items-center justify-center text-xs flex-shrink-0 mt-0.5"
                                aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <div>
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Pendampingan Tajam,
                                    Solutif &amp; Strategis</strong>
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
                                <strong class="block text-sm font-bold text-ns-light-100 mb-0.5">Tim Profesional
                                    Berdedikasi Tinggi</strong>
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

                    <!-- Mosaic Gallery -->
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

    <!--================ Start Team / Legal Partnership Area =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-ivory border-b border-ns-border-light"
        aria-labelledby="partner-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6 mb-10 sm:mb-12 pb-6 border-b border-ns-border-light">
                <div>
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Tim Advokat &amp; Konsultan</span>
                    </div>
                    <h2 id="partner-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Legal Partnership
                    </h2>
                </div>
                <p class="text-sm sm:text-base text-ns-ink-700 max-w-xl leading-relaxed m-0">
                    Reputasi kami dibangun di atas dedikasi rekanan advokat dan konsultan hukum yang mendampingi setiap
                    perkara secara menyeluruh.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse ($patners as $row)
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl">
                        <div class="bg-ns-navy-900 aspect-[4/4.5] overflow-hidden">
                            <img src="{{ asset('storage/' . $row->photo) }}"
                                alt="Foto {{ $row->name }} - {{ $row->position }}" width="400" height="480"
                                loading="lazy" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <span
                                class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">{{ $row->position }}</span>
                            <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">{{ $row->name }}</h3>
                            <p class="text-sm text-ns-ink-700 leading-relaxed whitespace-pre-line m-0">
                                {{ $row->description }}</p>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full max-w-2xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="lnr lnr-users"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Data Profil Partner Sedang
                            Diperbarui</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                            Saat ini daftar profil rekanan advokat (Legal Partnership) belum ditampilkan di halaman ini.
                            Anda tetap dapat menghubungi kantor kami untuk informasi tim pendamping perkara.
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
    <!--================ End Team Area =================-->

    <!--================ Start Client Reviews & Feedback CTA Area =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-navy-800 text-ns-light-100 border-t-2 border-b-2 border-ns-gold-500"
        aria-labelledby="ulasan-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Left Column -->
                <div class="lg:col-span-5">
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                        <span>Suara &amp; Kepercayaan Klien</span>
                    </div>
                    <h2 id="ulasan-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-light-100 mb-4">
                        Ulasan &amp; Penilaian Layanan
                    </h2>
                    <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed mb-6">
                        Masukan dari klien yang telah kami dampingi menjadi tolok ukur peningkatan mutu layanan hukum kami.
                        Bagikan pengalaman Anda bersama Kantor Hukum Nurul Safii &amp; Partners.
                    </p>
                    <div>
                        <a href="{{ route('contact') }}#review-form"
                            class="inline-flex items-center justify-center min-h-[48px] px-7 py-3 bg-ns-gold-400 text-ns-navy-900 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-white hover:border-white transition-all duration-150 shadow-lg">
                            Tulis Ulasan Layanan
                        </a>
                    </div>
                </div>

                <!-- Right Column: Review Carousel -->
                <div class="lg:col-span-7">
                    @if ($reviews->count() > 0)
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs sm:text-sm font-semibold text-ns-gold-400" id="review-counter-text"
                                aria-live="polite">
                                Menampilkan {{ $reviews->count() }} ulasan klien
                            </span>
                            @if ($reviews->count() > 1)
                                <div class="inline-flex gap-2">
                                    <button type="button"
                                        class="w-10 h-10 rounded bg-ns-navy-900 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm"
                                        id="review-prev-btn" aria-label="Ulasan sebelumnya">
                                        <i class="fas fa-chevron-up" aria-hidden="true"></i>
                                    </button>
                                    <button type="button"
                                        class="w-10 h-10 rounded bg-ns-navy-900 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm"
                                        id="review-pause-btn" aria-label="Jeda putaran otomatis ulasan"
                                        aria-pressed="false">
                                        <i class="fas fa-pause" aria-hidden="true"></i>
                                    </button>
                                    <button type="button"
                                        class="w-10 h-10 rounded bg-ns-navy-900 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm"
                                        id="review-next-btn" aria-label="Ulasan berikutnya">
                                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!-- Review Viewport -->
                        <div id="review-container"
                            class="h-[190px] overflow-hidden relative rounded-lg border border-ns-gold-400/40 bg-ns-navy-900 shadow-xl">
                            <div class="ns-review-track transition-transform duration-500 ease-in-out">
                                @foreach ($reviews as $review)
                                    <article
                                        class="h-[190px] p-6 flex flex-col justify-between bg-ns-navy-900 text-ns-light-100 box-border">
                                        <div class="flex justify-between items-center gap-3">
                                            <div class="text-ns-gold-400 text-base tracking-widest"
                                                aria-label="Rating {{ $review->rating }} dari 5 bintang">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <span aria-hidden="true">&#9733;</span>
                                                @endfor
                                                @for ($i = $review->rating; $i < 5; $i++)
                                                    <span class="text-slate-600" aria-hidden="true">&#9734;</span>
                                                @endfor
                                            </div>
                                            <time class="text-xs text-ns-light-300"
                                                datetime="{{ $review->created_at->format('Y-m-d') }}">
                                                {{ $review->created_at->format('d F Y') }}
                                            </time>
                                        </div>
                                        <p
                                            class="font-serif italic text-base sm:text-lg text-ns-light-100 line-clamp-2 my-2 leading-snug">
                                            &ldquo;{{ $review->message }}&rdquo;
                                        </p>
                                        <div class="text-sm font-bold text-ns-gold-400">{{ $review->name }}</div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div
                            class="max-w-xl mx-auto bg-ns-navy-900 border border-ns-gold-400/35 border-l-4 border-l-ns-gold-400 rounded-lg p-8 text-center shadow-xl">
                            <div class="w-14 h-14 rounded-full bg-ns-navy-800 border border-ns-gold-400/35 text-ns-gold-400 inline-flex items-center justify-center text-2xl mb-4"
                                aria-hidden="true">
                                <i class="lnr lnr-bubble"></i>
                            </div>
                            <h3 class="font-display font-bold text-xl text-ns-light-100 mb-2">Belum Ada Ulasan yang
                                Ditampilkan</h3>
                            <p class="text-sm text-ns-light-300 leading-relaxed mb-6">
                                Ulasan dari klien yang telah menggunakan layanan hukum kami akan ditampilkan di bagian ini.
                                Jika Anda pernah berkonsultasi bersama kami, silakan kirimkan ulasan Anda.
                            </p>
                            <a href="{{ route('contact') }}#review-form"
                                class="inline-flex items-center justify-center min-h-[48px] px-7 py-3 bg-ns-gold-400 text-ns-navy-900 font-bold text-sm tracking-wide rounded hover:bg-white transition shadow-lg">
                                Berikan Ulasan Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================ End Client Reviews Area =================-->

    <!--================ Start Latest News / Berita Terbaru Area =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" aria-labelledby="berita-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 sm:mb-12 pb-6 border-b border-ns-border-light">
                <div>
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Publikasi &amp; Informasi Hukum</span>
                    </div>
                    <h2 id="berita-heading"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Berita &amp; Sorotan Hukum Terbaru
                    </h2>
                </div>
                <a href="{{ route('break-news') }}"
                    class="inline-flex items-center gap-2 font-bold text-sm text-ns-navy-900 border-b-2 border-ns-gold-500 pb-1 hover:text-ns-gold-700 transition">
                    Lihat Semua Berita <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($news as $row)
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl">
                        <div class="bg-ns-navy-900 aspect-[16/10] overflow-hidden">
                            <img src="{{ asset('storage/' . $row->picture) }}"
                                alt="Ilustrasi berita: {{ $row->title }}" width="480" height="300"
                                loading="lazy" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex items-center gap-2 text-xs font-semibold text-ns-ink-500 mb-2">
                                <time datetime="{{ \Carbon\Carbon::parse($row->date_publish)->format('Y-m-d') }}">
                                    {{ \Carbon\Carbon::parse($row->date_publish)->format('d F Y') }}
                                </time>
                                <span aria-hidden="true">&middot;</span>
                                <span>{{ $row->author }}</span>
                            </div>
                            <h3 class="font-display font-bold text-lg text-ns-ink-900 leading-snug mb-4 flex-1">
                                <a href="{{ $row->url }}" target="_blank" rel="noopener noreferrer"
                                    class="hover:text-ns-gold-700 transition-colors">
                                    {{ $row->title }}
                                </a>
                            </h3>
                            <div class="pt-3 border-t border-ns-border-light">
                                <a href="{{ $row->url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full max-w-2xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="lnr lnr-file-empty"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Belum Ada Publikasi Berita Terbaru
                        </h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                            Artikel berita dan pembaruan kegiatan hukum sedang dalam tahap penyusunan oleh tim redaksi kami.
                            Anda dapat menelusuri Artikel Hukum atau Jurnal Hukum yang tersedia.
                        </p>
                        <div class="flex flex-wrap justify-center gap-3">
                            <a href="{{ route('article') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                                Baca Artikel Hukum
                            </a>
                            <a href="{{ route('file') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-transparent text-ns-navy-900 font-bold text-xs uppercase tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-900 hover:text-ns-light-100 transition">
                                Lihat Jurnal Hukum
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--================ End Latest News Area =================-->

    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const list = document.querySelector('.ns-review-track');
                const items = document.querySelectorAll('#review-container article');
                const prevBtn = document.getElementById('review-prev-btn');
                const nextBtn = document.getElementById('review-next-btn');
                const pauseBtn = document.getElementById('review-pause-btn');

                if (!list || items.length <= 1) return;

                let index = 0;
                let isPaused = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                let intervalId = null;

                function updateCarousel() {
                    const itemHeight = items[0].offsetHeight;
                    list.style.transform = `translateY(-${index * itemHeight}px)`;
                }

                function startAutoSlide() {
                    if (isPaused) return;
                    stopAutoSlide();
                    intervalId = setInterval(() => {
                        index = (index + 1) % items.length;
                        updateCarousel();
                    }, 5000);
                }

                function stopAutoSlide() {
                    if (intervalId) {
                        clearInterval(intervalId);
                        intervalId = null;
                    }
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        index = (index - 1 + items.length) % items.length;
                        updateCarousel();
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        index = (index + 1) % items.length;
                        updateCarousel();
                    });
                }

                if (pauseBtn) {
                    if (isPaused) {
                        pauseBtn.setAttribute('aria-pressed', 'true');
                        pauseBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i>';
                        pauseBtn.setAttribute('aria-label', 'Jalankan putaran otomatis ulasan');
                    }
                    pauseBtn.addEventListener('click', function() {
                        isPaused = !isPaused;
                        pauseBtn.setAttribute('aria-pressed', isPaused ? 'true' : 'false');
                        if (isPaused) {
                            stopAutoSlide();
                            pauseBtn.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i>';
                            pauseBtn.setAttribute('aria-label', 'Jalankan putaran otomatis ulasan');
                        } else {
                            startAutoSlide();
                            pauseBtn.innerHTML = '<i class="fas fa-pause" aria-hidden="true"></i>';
                            pauseBtn.setAttribute('aria-label', 'Jeda putaran otomatis ulasan');
                        }
                    });
                }

                window.addEventListener('resize', updateCarousel, {
                    passive: true
                });
                startAutoSlide();
            });
        </script>
    @endpush
@endsection
