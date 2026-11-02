@extends('interface.layout.app')
@section('title', 'Dokumentasi & Galeri Kegiatan | Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500" aria-labelledby="gallery-banner-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Galeri Kami</span>
                </nav>

                <p class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    DOKUMENTASI &amp; ARSIP AKTIVITAS
                </p>
                <h1 id="gallery-banner-heading" class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Galeri <span class="text-ns-gold-400">Kegiatan Kami</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Rekam jejak visual pendampingan hukum, persidangan pengadilan, audiensi klien, dan aktivitas profesional tim Kantor Hukum Nurul Safii &amp; Partners.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Gallery Grid Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="daftar-galeri" aria-labelledby="gallery-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6 mb-12 pb-6 border-b border-ns-border-light">
                <div>
                    <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                        <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                        <span>Dokumentasi Berkas &amp; Perkara</span>
                    </div>
                    <h2 id="gallery-heading" class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 m-0">
                        Potret Aktivitas &amp; Pengabdian Hukum
                    </h2>
                </div>
                <p class="text-sm sm:text-base text-ns-ink-700 max-w-xl leading-relaxed m-0">
                    Transparansi kerja nyata dan integritas dalam mendampingi klien di dalam maupun luar pengadilan secara berkeadilan.
                </p>
            </div>

            <!-- Grid 3 Kolom Modern & Konsisten -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse ($galeries as $index => $row)
                    @php
                        // Format caption name if generic like 'foto1', otherwise show meaningful caption
                        $rawName = trim($row->name ?? '');
                        $hasCustomTitle = $rawName && !preg_match('/^foto\s*\d+$/i', $rawName);
                        $displayTitle = $hasCustomTitle ? $rawName : 'Dokumentasi Penanganan Hukum #' . sprintf('%02d', $index + 1);
                    @endphp

                    <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
                        <!-- Image Container with Modal Trigger -->
                        <div class="relative h-64 sm:h-72 bg-ns-navy-950 overflow-hidden">
                            <img src="{{ asset('storage/' . $row->image) }}"
                                 alt="{{ $displayTitle }}"
                                 width="600" height="420"
                                 loading="lazy" decoding="async"
                                 class="w-full h-full object-cover object-center filter brightness-95 group-hover:scale-105 group-hover:brightness-100 transition-all duration-500">

                            <!-- Index Badge -->
                            <span class="absolute top-3 left-3 bg-ns-navy-950/90 text-ns-gold-400 border border-ns-gold-400/60 font-display font-bold text-xs px-2.5 py-1 rounded backdrop-blur-sm shadow-md" aria-hidden="true">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>

                            <!-- Zoom / View Indicator Button -->
                            <button type="button"
                                    onclick="openGalleryModal('{{ asset('storage/' . $row->image) }}', '{{ addslashes($displayTitle) }}')"
                                    class="absolute top-3 right-3 w-9 h-9 rounded bg-ns-navy-950/80 text-ns-light-100 border border-ns-gold-400/40 hover:bg-ns-gold-400 hover:text-ns-navy-950 transition flex items-center justify-center text-xs backdrop-blur-sm"
                                    aria-label="Perbesar foto {{ $displayTitle }}">
                                <i class="fas fa-expand" aria-hidden="true"></i>
                            </button>

                            <!-- Gradient at bottom of image for sleek contrast -->
                            <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-ns-navy-950/70 to-transparent pointer-events-none"></div>
                        </div>

                        <!-- Card Footer / Caption -->
                        <div class="p-5 sm:p-6 flex flex-col flex-1 bg-white justify-between">
                            <div>
                                <div class="text-[11px] font-bold uppercase tracking-widest text-ns-gold-700 mb-1.5">
                                    Dokumentasi Kegiatan
                                </div>
                                <h3 class="font-display font-bold text-base sm:text-lg text-ns-ink-900 leading-snug">
                                    {{ $displayTitle }}
                                </h3>
                            </div>

                            <div class="mt-4 pt-3 border-t border-ns-border-light flex items-center justify-between">
                                <span class="text-xs text-ns-ink-500 font-medium">Kantor Hukum NS &amp; Partners</span>
                                <button type="button"
                                        onclick="openGalleryModal('{{ asset('storage/' . $row->image) }}', '{{ addslashes($displayTitle) }}')"
                                        class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                    <span>Lihat Penuh</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </button>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4" aria-hidden="true">
                            <i class="fas fa-images"></i>
                        </div>
                        <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">Galeri Foto Sedang Diperbarui</h4>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                            Dokumentasi kegiatan dan arsip persidangan sedang dalam proses kurasi oleh tim kantor.
                        </p>
                        <a href="{{ route('welcome') }}" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                            Kembali ke Beranda
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--================ End Gallery Grid Section =================-->

    <!--================ Gallery Lightbox Modal =================-->
    <div id="gallery-lightbox" class="fixed inset-0 z-[999999] hidden items-center justify-center bg-ns-navy-950/90 backdrop-blur-md p-4 sm:p-6" role="dialog" aria-modal="true" aria-labelledby="lightbox-title">
        <div class="relative max-w-4xl w-full bg-ns-navy-900 border-2 border-ns-gold-500 rounded-xl overflow-hidden shadow-2xl flex flex-col max-h-[90vh]">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-ns-gold-500/30 bg-ns-navy-950">
                <h3 id="lightbox-title" class="font-display font-bold text-base sm:text-lg text-ns-light-100 truncate pr-4"></h3>
                <button type="button" onclick="closeGalleryModal()" class="w-9 h-9 rounded bg-ns-navy-800 text-ns-light-300 hover:text-ns-gold-400 hover:bg-ns-navy-700 transition flex items-center justify-center text-sm" aria-label="Tutup jendela pratinjau">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal Body (Image) -->
            <div class="p-2 sm:p-4 bg-ns-navy-950 flex items-center justify-center overflow-auto max-h-[calc(90vh-120px)]">
                <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[70vh] object-contain rounded border border-ns-navy-800 shadow-md">
            </div>
            <!-- Modal Footer -->
            <div class="px-6 py-3 border-t border-ns-gold-500/20 bg-ns-navy-900 flex items-center justify-between text-xs text-ns-light-300">
                <span>Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp; Partners</span>
                <button type="button" onclick="closeGalleryModal()" class="font-bold text-ns-gold-400 hover:underline">
                    Tutup (Esc)
                </button>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    function openGalleryModal(src, title) {
        const modal = document.getElementById('gallery-lightbox');
        const img = document.getElementById('lightbox-img');
        const heading = document.getElementById('lightbox-title');
        if (!modal || !img || !heading) return;

        img.src = src;
        img.alt = title;
        heading.textContent = title;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeGalleryModal() {
        const modal = document.getElementById('gallery-lightbox');
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    // Close on click outside modal content
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('gallery-lightbox');
        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeGalleryModal();
                }
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeGalleryModal();
            }
        });
    });
</script>
@endpush
