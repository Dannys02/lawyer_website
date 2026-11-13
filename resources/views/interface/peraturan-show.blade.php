@extends('interface.layout.app')
@section('title', $peraturan->jenis_peraturan . ' No. ' . $peraturan->nomor . ' Th. ' . $peraturan->tahun . ' | Kantor Hukum Nurul Safii')

@php
    $metaTitle = $peraturan->jenis_peraturan . ' Nomor ' . $peraturan->nomor . ' Tahun ' . $peraturan->tahun . ' tentang ' . $peraturan->tentang;
    $metaDescription = Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($peraturan->deskripsi ?? ''))), 160);
@endphp

@push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Kantor Hukum Nurul Safii & Partners">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section
        class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-14 sm:pb-16 overflow-hidden border-b-4 border-ns-gold-500"
        aria-labelledby="peraturan-detail-heading">
        <!-- Background Overlay -->
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
                <a href="{{ route('file') }}" class="hover:text-ns-gold-400 transition-colors">Kumpulan Peraturan</a>
                <span class="text-ns-gold-400">&bull;</span>
                <span class="text-ns-gold-400 truncate max-w-[200px] sm:max-w-xs" aria-current="page">
                    {{ $peraturan->jenis_peraturan }} No. {{ $peraturan->nomor }}/{{ $peraturan->tahun }}
                </span>
            </nav>

            <div class="flex flex-wrap items-center gap-2.5 mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-ns-gold-400 text-ns-navy-950">
                    <i class="fas fa-balance-scale"></i>
                    {{ $peraturan->jenis_peraturan }}
                </span>

                @if ($peraturan->status === 'Berlaku')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-400/40">
                        Status: {{ $peraturan->status }}
                    </span>
                @elseif ($peraturan->status === 'Diubah')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-400/40">
                        Status: {{ $peraturan->status }}
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-500/20 text-slate-300 border border-slate-400/40">
                        Status: {{ $peraturan->status }}
                    </span>
                @endif
            </div>

            <h1 id="peraturan-detail-heading"
                class="font-serif font-bold text-2xl sm:text-3xl md:text-4xl text-ns-light-100 leading-tight tracking-tight mb-4">
                {{ $peraturan->jenis_peraturan }} Nomor {{ $peraturan->nomor }} Tahun {{ $peraturan->tahun }}
            </h1>

            <p class="text-base sm:text-lg text-ns-gold-400 font-serif leading-relaxed mb-6">
                tentang {{ $peraturan->tentang }}
            </p>

            <!-- Meta Badges Bar -->
            <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-sm text-ns-light-300 border-t border-ns-navy-800 pt-4">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Tanggal Pengundangan</span>
                        <span class="font-semibold text-ns-light-100">
                            {{ $peraturan->tanggal_pengundangan ? $peraturan->tanggal_pengundangan->locale('id')->isoFormat('D MMMM Y') : 'Tidak Tercatat' }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                        <i class="fas fa-file-invoice" aria-hidden="true"></i>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Tahun Terbit</span>
                        <span class="font-semibold text-ns-light-100">{{ $peraturan->tahun }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-ns-navy-800 border border-ns-gold-400 flex items-center justify-center text-ns-gold-400 text-xs">
                        <i class="far fa-eye" aria-hidden="true"></i>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase text-ns-gold-400 font-bold">Dibaca</span>
                        <span class="font-semibold text-ns-light-100">{{ number_format($peraturan->views ?? 0) }} kali</span>
                    </div>
                </div>

                @if ($peraturan->file_path)
                    <div class="flex items-center gap-2">
                        <a href="{{ route('download-pdf', $peraturan->id) }}"
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-lg bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider hover:bg-white transition shadow">
                            <i class="fas fa-download"></i>
                            <span>Unduh Naskah Asli</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Content Section =================-->
    <section class="py-14 sm:py-18 lg:py-20 bg-ns-paper">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12">
                <!-- Main Content (Col 8) -->
                <main class="lg:col-span-8 space-y-8">
                    <!-- Lembar Informasi Resmi Peraturan -->
                    <div class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-xl p-6 sm:p-8 shadow-sm">
                        <!-- Judul Ringkas & Header Tabel -->
                        <div class="border-b border-ns-border-light pb-5 mb-6">
                            <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">
                                Metadata Regulasi
                            </div>
                            <h2 class="font-serif font-bold text-xl sm:text-2xl text-ns-ink-900">
                                Detail Dokumen Hukum
                            </h2>
                        </div>

                        <!-- Data Grid Summary -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 text-sm mb-8 bg-ns-ivory/50 p-5 rounded-lg border border-ns-border-light">
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-ink-500 mb-1">Jenis Peraturan</span>
                                <span class="font-semibold text-ns-ink-900">{{ $peraturan->jenis_peraturan }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-ink-500 mb-1">Nomor / Tahun</span>
                                <span class="font-semibold text-ns-ink-900">Nomor {{ $peraturan->nomor }} Tahun {{ $peraturan->tahun }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-ink-500 mb-1">Status Keberlakuan</span>
                                <span class="font-semibold text-ns-ink-900">{{ $peraturan->status }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-ink-500 mb-1">Tanggal Diundangkan</span>
                                <span class="font-semibold text-ns-ink-900">
                                    {{ $peraturan->tanggal_pengundangan ? $peraturan->tanggal_pengundangan->locale('id')->isoFormat('D MMMM Y') : '-' }}
                                </span>
                            </div>
                            <div class="sm:col-span-2">
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-ink-500 mb-1">Tentang</span>
                                <span class="font-semibold text-ns-ink-900 leading-relaxed">{{ $peraturan->tentang }}</span>
                            </div>
                        </div>

                        <!-- Section: Deskripsi Peraturan -->
                        @if (!empty($peraturan->deskripsi))
                            <div class="mb-8">
                                <div class="flex items-center gap-2 pb-2 mb-3 border-b-2 border-ns-gold-400">
                                    <i class="fas fa-file-alt text-ns-gold-600 text-base"></i>
                                    <h3 class="font-serif font-bold text-lg text-ns-ink-900 m-0">
                                        Deskripsi Peraturan
                                    </h3>
                                </div>
                                <div class="prose max-w-none text-sm text-ns-ink-800 leading-relaxed space-y-4">
                                    {!! $peraturan->deskripsi !!}
                                </div>
                            </div>
                        @endif

                        <!-- Berkas Dokumen Unduhan -->
                        <div class="pt-6 border-t border-ns-border-light flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-ns-ivory p-5 rounded-xl border">
                            <div>
                                <span class="block text-xs font-bold uppercase tracking-wider text-ns-navy-900 mb-0.5">
                                    Berkas Salinan Resmi
                                </span>
                                <p class="text-xs text-ns-ink-600">
                                    {{ $peraturan->file_path ? 'Dokumen PDF tersedia dan siap diunduh' : 'Berkas digital sedang dalam proses pengunggahan' }}
                                </p>
                            </div>

                            <div class="flex items-center gap-3">
                                @if ($peraturan->file_path)
                                    <a href="{{ route('view-pdf', $peraturan->id) }}" target="_blank"
                                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-white text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded-lg border border-[#C8C4BC] hover:bg-ns-navy-900 hover:text-white transition">
                                        <i class="far fa-eye"></i>
                                        <span>Buka Berkas</span>
                                    </a>
                                    <a href="{{ route('download-pdf', $peraturan->id) }}"
                                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-ns-navy-900 hover:text-ns-gold-400 transition shadow">
                                        <i class="fas fa-download"></i>
                                        <span>Unduh PDF</span>
                                    </a>
                                @else
                                    <span class="text-xs text-slate-400 italic">File belum diunggah</span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Kembali -->
                        <div class="mt-8 pt-4 border-t border-ns-border-light flex items-center justify-between flex-wrap gap-4">
                            <a href="{{ route('file') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-ns-navy-800 transition">
                                &larr; Kembali ke Daftar Peraturan
                            </a>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-ns-navy-900 hover:text-ns-light-100 transition shadow">
                                Konsultasikan Regulasi Ini
                            </a>
                        </div>
                    </div>
                </main>

                <!-- Sidebar (Col 4) -->
                <aside class="lg:col-span-4 space-y-8">
                    <!-- Kotak Bantuan Hukum -->
                    <div class="bg-ns-navy-900 text-ns-light-100 border border-ns-navy-800 border-t-4 border-t-ns-gold-400 rounded-xl p-6 sm:p-7 shadow-lg">
                        <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                            <span>Bantuan Regulasi &amp; Kepatuhan</span>
                        </div>
                        <h2 class="font-serif font-bold text-xl text-ns-light-100 mb-3">
                            Konsultasi Hukum Peraturan
                        </h2>
                        <p class="text-xs sm:text-sm text-ns-light-300 leading-relaxed mb-6">
                            Memerlukan telaah kepatuhan hukum atau penyesuaian operasional bisnis terhadap regulasi ini? Hubungi tim advokat kami.
                        </p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center w-full min-h-[46px] px-6 py-3 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-white transition shadow-md">
                            Hubungi Tim Advokat
                        </a>
                    </div>

                    <!-- Rekomendasi / Peraturan Terkait Lainnya -->
                    <div class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-xl p-6 shadow-sm">
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">
                            Pustaka Regulasi
                        </div>
                        <h2 class="font-display font-bold text-lg text-ns-ink-900 pb-3 mb-4 border-b border-ns-border-light">
                            Peraturan Terkait Lainnya
                        </h2>

                        <div class="space-y-4">
                            @forelse ($otherPeraturans as $item)
                                <article class="pb-4 border-b border-ns-border-light/70 last:border-0 last:pb-0">
                                    <div class="flex items-center gap-2 text-[11px] mb-1">
                                        <span class="font-bold text-ns-gold-700 uppercase">{{ $item->jenis_peraturan }}</span>
                                        <span class="text-ns-border-light">&bull;</span>
                                        <span class="text-ns-ink-500">No. {{ $item->nomor }}/{{ $item->tahun }}</span>
                                    </div>
                                    <h3 class="font-display font-bold text-xs sm:text-sm text-ns-ink-900 leading-snug hover:text-ns-gold-700 transition">
                                        <a href="{{ route('peraturan.detail', $item->id) }}">
                                            {{ $item->tentang }}
                                        </a>
                                    </h3>
                                </article>
                            @empty
                                <p class="text-xs text-ns-ink-500 italic">Belum ada peraturan terkait lainnya.</p>
                            @endforelse
                        </div>

                        <div class="mt-6 pt-4 border-t border-ns-border-light text-center">
                            <a href="{{ route('file') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                                <span>Lihat Seluruh Koleksi Peraturan &rarr;</span>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!--================ End Content Section =================-->
@endsection
