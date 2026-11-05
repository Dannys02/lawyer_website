@extends('interface.layout.app')
@section('title', 'Legal Partnership | Pengacara Banyuwangi Safi')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="partner-banner-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Legal Partnership</span>
                </nav>

                <p
                    class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    TIM KAMI
                </p>
                <h1 id="partner-banner-heading"
                    class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Legal <span class="text-ns-gold-400">Partnership</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Kami memiliki anggota tim yang akan membantu selama pelayanan berlangsung.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Partners Grid Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-partner"
        aria-labelledby="partner-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header (Teks Asli Sederhana) -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <div
                    class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                    <span>Legal Partnership</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                </div>
                <h2 id="partner-heading"
                    class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-3">
                    Mari bertemu dengan tim kami!
                </h2>
                <p class="text-sm sm:text-base text-ns-ink-700 leading-relaxed">
                    Kami memiliki anggota tim yang akan membantu selama pelayanan berlangsung
                </p>
            </div>

            <!-- Grid 3 Kolom Sejajar: Menonjolkan Potret Card Tim -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                @forelse ($patners as $row)
                    <article
                        class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl">
                        <div class="bg-ns-navy-900 overflow-hidden">
                            <img src="{{ asset('storage/' . $row->photo) }}"
                                alt="Foto {{ $row->name }} - {{ $row->position }}" width="400" height="480"
                                loading="lazy" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <span
                                class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">{{ $row->position }}</span>
                            <h3 class="font-display font-bold text-xl text-ns-ink-900 mb-2">{{ $row->name }}</h3>
                            <div class="text-sm text-ns-ink-700 leading-relaxed m-0 space-y-2">
                                {!! $row->description !!}
                            </div>
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
    <!--================ End Partners Grid Section =================-->
@endsection
