@extends('interface.layout.app')
@section('title', 'Tentang Kami | Pengacara Banyuwangi Safi')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="about-heading">
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
                    <a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors">Beranda</a>
                    <span class="text-ns-gold-400">&bull;</span>
                    <span class="text-ns-gold-400" aria-current="page">Tentang Kami</span>
                </nav>

                <p
                    class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    PROFIL, VISI &amp; NILAI LUHUR
                </p>
                <h1 id="about-heading"
                    class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-4">
                    Integritas, Kecermatan, <span class="text-ns-gold-400">&amp; Keberanian</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Mengenal lebih dekat dedikasi dan komitmen Kantor Hukum Nurul Safii &amp; Partners sebagai garda pembela
                    hak hukum Anda secara bermartabat dan solutif.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Profile / Firm Overview Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-ivory border-b border-ns-border-light" id="profil-firma"
        aria-labelledby="profil-title">
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

                <!-- Text Editorial Content -->
                <div class="lg:col-span-7">
                    <div
                        class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2.5">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Dedikasi &amp; Legalitas</span>
                    </div>
                    <h2 id="profil-title"
                        class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-5 leading-tight">
                        Profil Kantor Hukum
                    </h2>
                    <p class="text-base text-ns-ink-700 leading-relaxed mb-4 text-justify">
                        <strong class="text-ns-ink-900 font-semibold">Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp;
                            PARTNERS</strong> adalah kantor hukum independen yang hadir sebagai representasi integritas,
                        kecermatan, dan keberanian dalam menegakkan keadilan di tengah kompleksitas dinamika hukum
                        kontemporer. Berdiri di atas nilai-nilai luhur profesi hukum (*officium nobile*), kantor ini
                        didirikan oleh <strong>Nurul Safii, S.H., M.H., C.MSP</strong>, seorang advokat sekaligus konsultan
                        strategis yang dikenal atas ketajaman analisis hukum serta kepedulian sosialnya.
                    </p>
                    <p class="text-base text-ns-ink-700 leading-relaxed mb-6 text-justify">
                        Kami bukan sekadar penyedia jasa hukum, melainkan mitra strategis yang mendampingi klien dalam
                        menghadapi risiko hukum, merumuskan langkah taktis, dan memperjuangkan setiap perkara secara
                        terhormat. Dengan pendekatan yang sistematis, berbasis riset, dan berorientasi pada hasil, kami
                        meyakini bahwa keadilan bukan hanya untuk dicari, tetapi untuk diperjuangkan dengan kehormatan.
                    </p>

                    <!-- Quote Box Callout -->
                    <div class="bg-white border-l-4 border-ns-gold-500 border border-ns-border-light p-5 rounded shadow-sm">
                        <p class="font-serif italic text-base sm:text-lg text-ns-ink-900 m-0 leading-relaxed">
                            &ldquo;Keadilan adalah mahkota dari setiap proses hukum. Integritas dan ketelitian adalah
                            fondasi utama kami dalam membela hak setiap pencari keadilan.&rdquo;
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Profile Section =================-->

    <!--================ Start Visi & Misi Section (Deep Navy Authority) =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-navy-900 text-ns-light-100 border-t-4 border-b-4 border-ns-gold-500"
        aria-labelledby="visi-misi-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    <span>Arah &amp; Komitmen Institusional</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                </div>
                <h2 id="visi-misi-heading"
                    class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-light-100 mb-4">
                    Visi &amp; Misi Firma Hukum
                </h2>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed">
                    Fondasi cita-cita dan komitmen operasional yang memandu setiap langkah penanganan perkara dan
                    pendampingan klien kami.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
                <!-- Visi Card (5 Kolom) -->
                <div class="lg:col-span-5 flex flex-col">
                    <div
                        class="bg-ns-navy-800 border border-ns-gold-400/40 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-8 flex-1 flex flex-col justify-between shadow-xl">
                        <div>
                            <div class="w-12 h-12 rounded-full bg-ns-navy-900 border border-ns-gold-400/40 text-ns-gold-400 flex items-center justify-center text-xl mb-5"
                                aria-hidden="true">
                                <i class="fas fa-eye"></i>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2 block">Visi
                                Kami</span>
                            <h3 class="font-display font-bold text-xl sm:text-2xl text-ns-light-100 mb-4">
                                Garda Terdepan Penegakan Hukum Nasional
                            </h3>
                            <blockquote
                                class="font-serif italic text-base sm:text-lg text-ns-light-100 leading-relaxed border-l-2 border-ns-gold-400 pl-4 py-1 m-0">
                                &ldquo;Menjadi kantor hukum yang unggul dan terpercaya secara nasional, dengan reputasi
                                sebagai pelindung hak-hak hukum yang tangguh, profesional, dan progresif.&rdquo;
                            </blockquote>
                        </div>
                        <div class="pt-6 mt-6 border-t border-white/10 text-xs text-ns-light-300">
                            Komitmen jangka panjang untuk menghadirkan kepastian hukum bermartabat.
                        </div>
                    </div>
                </div>

                <!-- Misi List (7 Kolom) -->
                <div class="lg:col-span-7 flex flex-col">
                    <div
                        class="bg-ns-navy-800 border border-ns-gold-400/40 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-8 flex-1 shadow-xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-full bg-ns-navy-900 border border-ns-gold-400/40 text-ns-gold-400 flex items-center justify-center text-xl flex-shrink-0"
                                aria-hidden="true">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-400 block">Misi
                                    Kami</span>
                                <h3 class="font-display font-bold text-xl sm:text-2xl text-ns-light-100 m-0">Langkah Nyata
                                    Pelayanan</h3>
                            </div>
                        </div>

                        <ul class="space-y-3.5 list-none p-0 m-0">
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/80 p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span
                                    class="w-6 h-6 rounded-full bg-ns-gold-400 text-ns-navy-900 font-bold text-xs inline-flex items-center justify-center flex-shrink-0 mt-0.5">1</span>
                                <span class="text-sm text-ns-light-200 leading-relaxed">Menyediakan layanan hukum yang
                                    berstandar tinggi, responsif, dan berorientasi solusi.</span>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/80 p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span
                                    class="w-6 h-6 rounded-full bg-ns-gold-400 text-ns-navy-900 font-bold text-xs inline-flex items-center justify-center flex-shrink-0 mt-0.5">2</span>
                                <span class="text-sm text-ns-light-200 leading-relaxed">Menjaga marwah profesi advokat
                                    melalui integritas, objektivitas, dan keteladanan.</span>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/80 p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span
                                    class="w-6 h-6 rounded-full bg-ns-gold-400 text-ns-navy-900 font-bold text-xs inline-flex items-center justify-center flex-shrink-0 mt-0.5">3</span>
                                <span class="text-sm text-ns-light-200 leading-relaxed">Mendorong terciptanya kepastian dan
                                    keadilan hukum bagi setiap klien.</span>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/80 p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span
                                    class="w-6 h-6 rounded-full bg-ns-gold-400 text-ns-navy-900 font-bold text-xs inline-flex items-center justify-center flex-shrink-0 mt-0.5">4</span>
                                <span class="text-sm text-ns-light-200 leading-relaxed">Memberikan edukasi hukum yang
                                    membumi, mencerdaskan, dan membebaskan.</span>
                            </li>
                            <li
                                class="flex items-start gap-3.5 bg-ns-navy-900/80 p-3.5 rounded border-l-2 border-ns-gold-400">
                                <span
                                    class="w-6 h-6 rounded-full bg-ns-gold-400 text-ns-navy-900 font-bold text-xs inline-flex items-center justify-center flex-shrink-0 mt-0.5">5</span>
                                <span class="text-sm text-ns-light-200 leading-relaxed">Membangun kemitraan jangka panjang
                                    dengan entitas bisnis dan institusi negara.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Visi & Misi Section =================-->

    <!--================ Start Nilai Fundamental Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" aria-labelledby="nilai-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                    <span>Pilar Filosofis Kantor</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                </div>
                <h2 id="nilai-heading"
                    class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-4">
                    Nilai Fundamental Kami
                </h2>
                <p class="text-sm sm:text-base text-ns-ink-700 leading-relaxed">
                    Prinsip kerja dan komitmen etika yang mengakar kuat dalam setiap pendampingan dan pembelaan hak klien.
                </p>
            </div>

            <!-- 5 Fundamental Value Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- 1. Integritas -->
                <article
                    class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 flex items-center justify-center text-xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1 block">Pilar
                            I</span>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2.5">Integritas</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed m-0">
                            Menjaga kejujuran dan keterbukaan sebagai fondasi tak tergoyahkan dalam setiap tindakan hukum
                            yang kami ambil.
                        </p>
                    </div>
                </article>

                <!-- 2. Keberanian -->
                <article
                    class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 flex items-center justify-center text-xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1 block">Pilar
                            II</span>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2.5">Keberanian</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed m-0">
                            Bertindak tegas, gigih, dan pantang menyerah dalam membela kepentingan klien, tanpa kompromi
                            terhadap tegaknya keadilan.
                        </p>
                    </div>
                </article>

                <!-- 3. Profesionalisme -->
                <article
                    class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 flex items-center justify-center text-xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1 block">Pilar
                            III</span>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2.5">Profesionalisme</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed m-0">
                            Berpegang teguh pada kode etik profesi advokat, kompetensi yuridis teruji, dan ketelitian tinggi
                            dalam setiap dokumen serta persidangan.
                        </p>
                    </div>
                </article>

                <!-- 4. Inovasi -->
                <article
                    class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 flex items-center justify-center text-xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1 block">Pilar
                            IV</span>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2.5">Inovasi</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed m-0">
                            Mengintegrasikan pendekatan hukum modern berbasis riset dengan strategi kontemporer yang relevan
                            dengan dinamika era digital.
                        </p>
                    </div>
                </article>

                <!-- 5. Kepedulian (Spans 2 columns on tablet/desktop for balanced grid) -->
                <article
                    class="md:col-span-2 lg:col-span-2 bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 flex items-center justify-center text-xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1 block">Pilar
                            V</span>
                        <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2.5">Kepedulian</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed m-0">
                            Memahami bahwa hukum harus berpihak kepada kebenaran dan mereka yang membutuhkan. Kami
                            senantiasa menghadirkan empati serta kehangatan kemanusiaan dalam setiap pendampingan hukum.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!--================ End Nilai Fundamental Section =================-->
@endsection
