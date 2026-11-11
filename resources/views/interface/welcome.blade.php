@extends('interface.layout.app')
@section('title', 'Pengacara Banyuwangi Safi | Advokat, Mediator & Konsultan Hukum')

@section('content')
    <!--================ Start Home Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 lg:pt-40 pb-16 sm:pb-20 lg:pb-24 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="hero-heading">
        <!-- Background Media with Gradient Overlay and Parallax Scroll Effect -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
            <img src="{{ asset('interface/img/pengadilan.jpg') }}" alt="" id="hero-parallax-bg"
                class="w-full h-[130%] -top-[15%] relative object-cover object-center opacity-20 will-change-transform"
                fetchpriority="high">
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
                    <p class="text-justify text-sm sm:text-base leading-relaxed text-ns-light-300 max-w-2xl mb-8">
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

                <!-- Credential Card Sidebar (Logo Showcase) -->
                <aside class="lg:col-span-5" aria-label="Lambang Resmi Kantor Hukum">
                    <div id="hero-credential-card"
                        class="rounded-lg p-6 sm:p-8 transition-transform duration-100 ease-out will-change-transform min-h-[380px] sm:min-h-[420px] flex items-center justify-center">
                        <img src="{{ asset('interface/img/LOGO_NS_2.png') }}"
                            alt="Lambang Resmi Kantor Hukum Nurul Safii & Partners"
                            class="w-full max-w-[260px] sm:max-w-[300px] h-auto object-contain drop-shadow-[0_10px_25px_rgba(0,0,0,0.5)]">
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
                <!-- Visual Frame -->
                <div class="lg:col-span-5 flex flex-col items-center">
                    <div class="w-full max-w-md">
                        <div
                            class="relative h-64 sm:h-76 md:h-80 rounded-lg overflow-hidden bg-ns-navy-900 border-2 border-ns-gold-500/60 shadow-lg flex items-center justify-center">
                            <img src="{{ asset('storage/' . ($about->image ?? $aboutData->image)) }}"
                                alt="Profil Kantor Hukum Nurul Safii" class="max-w-[200px] sm:max-w-[240px] object-cover">
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
                    @php
                        $welcomeAboutText = $about->text_about ?? ($aboutData->text_about ?? null);
                    @endphp
                    @if (!empty($welcomeAboutText))
                        <div class="text-base text-ns-ink-700 leading-relaxed mb-6 space-y-4 text-justify">
                            @if ($welcomeAboutText !== strip_tags($welcomeAboutText))
                                {!! $welcomeAboutText !!}
                            @else
                                {!! nl2br(e($welcomeAboutText)) !!}
                            @endif
                        </div>
                    @else
                        <p class="text-base text-ns-ink-700 leading-relaxed mb-4">
                            <strong class="text-ns-ink-900 font-semibold">Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp;
                                Partners</strong> adalah kantor hukum independen yang hadir sebagai representasi integritas,
                            kecermatan, dan keberanian dalam menegakkan keadilan di tengah kompleksitas dinamika hukum.
                        </p>
                        <p class="text-base text-ns-ink-700 leading-relaxed mb-6">
                            Berdiri di atas nilai-nilai luhur profesi hukum, kantor hukum ini didirikan oleh <strong
                                class="text-ns-ink-900 font-semibold">Nurul Safii, S.H., M.H., C.MSP</strong>, seorang
                            advokat
                            sekaligus konsultan strategis yang dikenal atas ketajaman analisis hukumnya dan kepedulian
                            sosialnya. Kami mendampingi klien dalam memitigasi risiko hukum, merumuskan langkah taktis, dan
                            memperjuangkan keadilan secara bermartabat.
                        </p>
                    @endif

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

            </div>

            <!-- Practice Grid Dinamis dari Database (Table: services) - 3 Kolom Sejajar -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                @forelse ($services as $index => $item)
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
                        <a href="{{ route('service.show', $item->id) }}" class="block relative bg-ns-navy-800 aspect-[16/11] overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Ilustrasi {{ $item->title }}"
                                width="480" height="320" loading="lazy" decoding="async"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-5 sm:p-6 flex flex-col flex-1 justify-between bg-white">
                            <h3 class="font-display font-bold text-base sm:text-lg text-ns-ink-900 mb-4 line-clamp-2 leading-snug">
                                <a href="{{ route('service.show', $item->id) }}" class="hover:text-ns-gold-700 transition-colors">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <div class="pt-3 border-t border-ns-border-light mt-auto">
                                <a href="{{ route('service.show', $item->id) }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                    <span>Lihat Detail Layanan</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
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

                    <!-- Mosaic Gallery (Foto Dokumentasi Segmentasi Klien) -->
                    @php
                        $img1 = !empty($segmentation->picture1)
                            ? asset('storage/' . $segmentation->picture1)
                            : asset('interface/img/service/service4.jpg');
                        $img2 = !empty($segmentation->picture2)
                            ? asset('storage/' . $segmentation->picture2)
                            : asset('interface/img/service/service5.jpg');
                        $img3 = !empty($segmentation->picture3)
                            ? asset('storage/' . $segmentation->picture3)
                            : asset('interface/img/service/service6.jpg');
                        $img4 = !empty($segmentation->picture4)
                            ? asset('storage/' . $segmentation->picture4)
                            : asset('interface/img/service/service7.jpg');
                    @endphp
                    <div class="grid grid-cols-2 gap-3" aria-label="Dokumentasi Aktivitas Kantor Hukum">
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ $img1 }}" alt="Dokumentasi penanganan perkara hukum klien 1"
                                width="320" height="240" loading="lazy" decoding="async"
                                class="w-full h-full object-cover object-top [content-visibility:auto]">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ $img2 }}" alt="Dokumentasi pendampingan hukum klien 2" width="320"
                                height="240" loading="lazy" decoding="async"
                                class="w-full h-full object-cover object-top [content-visibility:auto]">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ $img3 }}" alt="Dokumentasi diskusi strategi hukum 3" width="320"
                                height="240" loading="lazy" decoding="async"
                                class="w-full h-full object-cover object-top [content-visibility:auto]">
                        </div>
                        <div class="rounded-lg overflow-hidden border border-ns-gold-400/30 bg-ns-navy-800 aspect-[4/3]">
                            <img src="{{ $img4 }}" alt="Dokumentasi konsultasi advokat kantor hukum 4"
                                width="320" height="240" loading="lazy" decoding="async"
                                class="w-full h-full object-cover object-top [content-visibility:auto]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Why Choose Us Area =================-->

    <!--================ Start Client Reviews & Feedback CTA Area (Featured Single Card Slider) =================-->
    <section
        class="py-16 sm:py-20 lg:py-24 bg-ns-navy-900 text-ns-light-100 border-t-2 border-b-2 border-ns-gold-500 relative overflow-hidden"
        aria-labelledby="ulasan-heading">
        <!-- Subtle Background Glow -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-ns-gold-500/5 rounded-full blur-3xl pointer-events-none"
            aria-hidden="true"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-ns-gold-500/5 rounded-full blur-3xl pointer-events-none"
            aria-hidden="true"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Left Column: Copy & Call-to-action -->
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
                        Masukan dan testimoni dari klien yang telah kami dampingi menjadi tolok ukur utama peningkatan mutu
                        pelayanan hukum kami yang amanah dan profesional.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}#review-form"
                            class="inline-flex items-center justify-center min-h-[48px] px-7 py-3 bg-ns-gold-400 text-ns-navy-900 font-bold text-sm tracking-wide rounded border-2 border-ns-gold-400 hover:bg-white hover:border-white transition-all duration-150 shadow-lg">
                            <i class="fas fa-pen-nib mr-2 text-xs" aria-hidden="true"></i> Tulis Ulasan Layanan
                        </a>
                    </div>
                </div>

                <!-- Right Column: Single Card Carousel Slider -->
                <div class="lg:col-span-7">
                    @if ($reviews->count() > 0)
                        <!-- Kontrol Navigasi & Indikator -->
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs sm:text-sm font-semibold text-ns-gold-400 flex items-center gap-2"
                                id="review-counter-text">
                                <span id="review-current-index">1</span> dari {{ $reviews->count() }} ulasan klien
                            </span>
                            @if ($reviews->count() > 1)
                                <div class="inline-flex items-center gap-2">
                                    <button type="button"
                                        class="w-10 h-10 rounded-lg bg-ns-navy-800 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-950 transition flex items-center justify-center text-sm shadow-md"
                                        id="review-prev-btn" aria-label="Ulasan sebelumnya">
                                        <i class="fas fa-chevron-up text-xs" aria-hidden="true"></i>
                                    </button>
                                    <button type="button"
                                        class="w-10 h-10 rounded-lg bg-ns-navy-800 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-950 transition flex items-center justify-center text-sm shadow-md"
                                        id="review-pause-btn" aria-label="Jeda putaran otomatis ulasan"
                                        aria-pressed="false">
                                        <i class="fas fa-pause text-xs" aria-hidden="true"></i>
                                    </button>
                                    <button type="button"
                                        class="w-10 h-10 rounded-lg bg-ns-navy-800 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-950 transition flex items-center justify-center text-sm shadow-md"
                                        id="review-next-btn" aria-label="Ulasan berikutnya">
                                        <i class="fas fa-chevron-down text-xs" aria-hidden="true"></i>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!-- Card Slider Wrapper (Vertical Fixed Height Container) -->
                        <div id="review-slider-wrapper"
                            class="overflow-hidden rounded-2xl relative h-[310px] sm:h-[300px]">
                            <div class="ns-review-slider flex flex-col transition-transform duration-700 ease-out h-full">
                                @foreach ($reviews as $review)
                                    <div class="w-full h-[310px] sm:h-[300px] flex-shrink-0 box-border py-1">
                                        <article
                                            class="bg-ns-navy-800/95 border border-ns-gold-400/30 border-t-4 border-t-ns-gold-400 rounded-2xl p-6 sm:p-8 flex flex-col justify-between shadow-2xl relative overflow-hidden h-full box-border">
                                            <!-- Watermark Quote -->
                                            <div class="absolute -top-3 right-6 text-ns-gold-400/10 text-8xl font-serif select-none pointer-events-none"
                                                aria-hidden="true">
                                                &rdquo;
                                            </div>

                                            <div class="flex-1 flex flex-col min-h-0">
                                                <!-- Rating & Tanggal -->
                                                <div class="flex items-center justify-between gap-3 mb-4 flex-shrink-0">
                                                    <div class="flex items-center gap-1.5 text-ns-gold-400 text-base"
                                                        aria-label="Rating {{ $review->rating }} dari 5 bintang">
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                            <i class="fas fa-star text-sm text-ns-gold-400"
                                                                aria-hidden="true"></i>
                                                        @endfor
                                                        @for ($i = $review->rating; $i < 5; $i++)
                                                            <i class="far fa-star text-sm text-slate-600"
                                                                aria-hidden="true"></i>
                                                        @endfor
                                                        <span
                                                            class="ml-2 text-xs font-bold text-ns-gold-400 bg-ns-navy-900/80 border border-ns-gold-400/30 px-2 py-0.5 rounded">
                                                            {{ $review->rating }}.0 / 5.0
                                                        </span>
                                                    </div>
                                                    <time class="text-xs text-ns-light-300 font-medium"
                                                        datetime="{{ $review->created_at ? $review->created_at->format('Y-m-d') : '' }}">
                                                        {{ $review->created_at ? $review->created_at->format('d F Y') : 'Klien Resmi' }}
                                                    </time>
                                                </div>

                                                <!-- Isi Pesan Testimoni Card (Scrollable jika teks panjang, ukuran card tetap seragam) -->
                                                <div class="overflow-y-auto pr-1 flex-1 mb-3">
                                                    <p
                                                        class="text-base sm:text-lg text-ns-light-100 font-normal leading-relaxed italic relative z-10 m-0">
                                                        &ldquo;{{ $review->message }}&rdquo;
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Identitas Klien & Avatar (Posisi Bawah Card Selalu Seragam) -->
                                            <div
                                                class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 flex-shrink-0 mt-auto">
                                                <div class="flex items-center gap-3.5">
                                                    <div
                                                        class="w-11 h-11 rounded-full bg-gradient-to-tr from-ns-gold-500 to-ns-gold-400 text-ns-navy-950 font-bold text-base flex items-center justify-center flex-shrink-0 shadow-lg">
                                                        {{ strtoupper(substr($review->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <h3
                                                            class="font-bold text-sm sm:text-base text-ns-light-100 m-0 leading-tight">
                                                            {{ $review->name }}
                                                        </h3>
                                                        <span class="text-xs text-ns-gold-400 font-medium block mt-0.5">
                                                            Klien Terverifikasi &bull; Kantor Hukum Nurul Safii
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div
                            class="max-w-xl mx-auto bg-ns-navy-800 border border-ns-gold-400/35 border-l-4 border-l-ns-gold-400 rounded-lg p-8 text-center shadow-xl">
                            <div class="w-14 h-14 rounded-full bg-ns-navy-900 border border-ns-gold-400/35 text-ns-gold-400 inline-flex items-center justify-center text-2xl mb-4"
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

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($news as $row)
                    <article
                        class="flex flex-col h-full bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl">
                        <div class="bg-ns-navy-900 h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $row->picture) }}"
                                alt="Ilustrasi berita: {{ $row->title }}" width="480" height="300"
                                loading="lazy" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex flex-wrap items-center gap-2 text-xs font-semibold text-ns-ink-500 mb-2">
                                <time datetime="{{ \Carbon\Carbon::parse($row->date_publish)->format('Y-m-d') }}"
                                    class="text-ns-gold-700 font-bold">
                                    {{ \Carbon\Carbon::parse($row->date_publish)->format('d F Y') }}
                                </time>
                                <span aria-hidden="true">&middot;</span>
                                <span class="truncate max-w-[130px]">{{ $row->author }}</span>
                                <span aria-hidden="true">&middot;</span>
                                <span
                                    class="inline-flex items-center gap-1 text-ns-ink-600 bg-ns-ivory px-2 py-0.5 rounded border border-ns-border-light text-[11px]"
                                    title="Dibaca {{ number_format($row->views ?? 0) }} kali">
                                    <i class="far fa-eye text-ns-gold-700" aria-hidden="true"></i>
                                    <span>{{ number_format($row->views ?? 0) }}x</span>
                                </span>
                            </div>
                            <h3 class="font-display font-bold text-lg text-ns-ink-900 leading-snug mb-4 flex-1">
                                <a href="{{ $row->url }}" target="_blank" rel="noopener noreferrer"
                                    class="hover:text-ns-gold-700 transition-colors">
                                    {{ $row->title }}
                                </a>
                            </h3>
                            <div class="pt-3 border-t border-ns-border-light mt-auto">
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
                            Anda dapat menelusuri Artikel Hukum atau Kumpulan Undang-Undang yang tersedia.
                        </p>
                        <div class="flex flex-wrap justify-center gap-3">
                            <a href="{{ route('article') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                                Baca Artikel Hukum
                            </a>
                            <a href="{{ route('file') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-transparent text-ns-navy-900 font-bold text-xs uppercase tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-900 hover:text-ns-light-100 transition">
                                Lihat Kumpulan Undang-Undang
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
                const track = document.querySelector('.ns-review-slider');
                const slides = document.querySelectorAll('.ns-review-slider > div');
                const prevBtn = document.getElementById('review-prev-btn');
                const nextBtn = document.getElementById('review-next-btn');
                const pauseBtn = document.getElementById('review-pause-btn');
                const indexIndicator = document.getElementById('review-current-index');

                if (!track || slides.length <= 1) return;

                let currentIndex = 0;
                let isPaused = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                let autoSlideInterval = null;

                function updateSlider() {
                    track.style.transform = `translateY(-${currentIndex * 100}%)`;
                    if (indexIndicator) {
                        indexIndicator.textContent = currentIndex + 1;
                    }
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % slides.length;
                    updateSlider();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    updateSlider();
                }

                function startAutoPlay() {
                    if (isPaused) return;
                    stopAutoPlay();
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }

                function stopAutoPlay() {
                    if (autoSlideInterval) {
                        clearInterval(autoSlideInterval);
                        autoSlideInterval = null;
                    }
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        prevSlide();
                        if (!isPaused) startAutoPlay();
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        nextSlide();
                        if (!isPaused) startAutoPlay();
                    });
                }

                if (pauseBtn) {
                    if (isPaused) {
                        pauseBtn.setAttribute('aria-pressed', 'true');
                        pauseBtn.innerHTML = '<i class="fas fa-play text-xs" aria-hidden="true"></i>';
                        pauseBtn.setAttribute('aria-label', 'Jalankan putaran otomatis ulasan');
                    }
                    pauseBtn.addEventListener('click', function() {
                        isPaused = !isPaused;
                        pauseBtn.setAttribute('aria-pressed', isPaused ? 'true' : 'false');
                        if (isPaused) {
                            stopAutoPlay();
                            pauseBtn.innerHTML = '<i class="fas fa-play text-xs" aria-hidden="true"></i>';
                            pauseBtn.setAttribute('aria-label', 'Jalankan putaran otomatis ulasan');
                        } else {
                            startAutoPlay();
                            pauseBtn.innerHTML = '<i class="fas fa-pause text-xs" aria-hidden="true"></i>';
                            pauseBtn.setAttribute('aria-label', 'Jeda putaran otomatis ulasan');
                        }
                    });
                }

                // Pause saat cursor hover di atas kartu slider
                const sliderContainer = document.getElementById('review-slider-wrapper');
                if (sliderContainer) {
                    sliderContainer.addEventListener('mouseenter', () => {
                        if (!isPaused) stopAutoPlay();
                    });
                    sliderContainer.addEventListener('mouseleave', () => {
                        if (!isPaused) startAutoPlay();
                    });
                }

                startAutoPlay();
            });
        </script>
    @endpush
@endsection
