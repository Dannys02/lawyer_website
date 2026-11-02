@extends('interface.layout.app')
@section('title', 'Legal Partnership | Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500" aria-labelledby="partner-banner-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Legal Partnership</span>
                </nav>

                <p class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    TIM KAMI
                </p>
                <h1 id="partner-banner-heading" class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
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
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-partner" aria-labelledby="partner-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header (Teks Asli Sederhana) -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                    <span>Legal Partnership</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                </div>
                <h2 id="partner-heading" class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-3">
                    Mari bertemu dengan tim kami!
                </h2>
                <p class="text-sm sm:text-base text-ns-ink-700 leading-relaxed">
                    Kami memiliki anggota tim yang akan membantu selama pelayanan berlangsung
                </p>
            </div>

            <!-- Grid 3 Kolom Sejajar: Menonjolkan Potret Card Tim -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse ($patners as $row)
                    <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
                        <!-- Partner Portrait Visual (Fokus Utama) -->
                        <div class="relative h-80 sm:h-96 bg-ns-navy-900 overflow-hidden">
                            <img src="{{ asset('storage/' . $row->photo) }}"
                                 alt="{{ $row->name }}"
                                 width="480" height="480"
                                 loading="lazy" decoding="async"
                                 class="w-full h-full object-cover object-top filter brightness-95 group-hover:scale-105 group-hover:brightness-100 transition-all duration-500">
                            
                            <!-- Position Badge -->
                            <span class="absolute top-3 left-3 bg-ns-navy-950/90 text-ns-gold-400 border border-ns-gold-400/60 font-sans font-bold text-xs uppercase tracking-wider px-3 py-1 rounded backdrop-blur-sm shadow-md">
                                {{ $row->position }}
                            </span>

                            <!-- Subtle gradient overlay at bottom of portrait -->
                            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-ns-navy-950/80 via-ns-navy-950/30 to-transparent pointer-events-none"></div>

                            <!-- Name over bottom of image for sleek visual impact -->
                            <div class="absolute inset-x-0 bottom-0 p-4 text-ns-light-100">
                                <span class="block text-[11px] font-bold uppercase tracking-widest text-ns-gold-400 mb-0.5">
                                    {{ $row->position }}
                                </span>
                                <h3 class="font-display font-bold text-lg sm:text-xl text-ns-light-100 leading-snug drop-shadow-sm">
                                    {{ $row->name }}
                                </h3>
                            </div>
                        </div>

                        <!-- Card Body (Deskripsi Asli) -->
                        <div class="p-6 flex flex-col flex-1 bg-white">
                            <div class="text-sm text-ns-ink-700 leading-relaxed flex-1" style="white-space: pre-line;">
                                {{ $row->description }}
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4" aria-hidden="true">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Kami belum memiliki Partner</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--================ End Partners Grid Section =================-->
@endsection
