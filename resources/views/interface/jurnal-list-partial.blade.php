<!-- Grid 3 Kolom Sejajar Konsisten -->
<div class="grid grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
    @forelse ($file as $index => $row)
        <article
            class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
            <!-- Thumbnail Media -->
            <div class="relative bg-ns-navy-950 aspect-[16/10] overflow-hidden">
                @if (!empty($row->thumbnail))
                    <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="Sampul Jurnal {{ $row->title }}"
                        width="540" height="340" loading="lazy" decoding="async"
                        class="w-full h-full object-cover object-top filter brightness-95 group-hover:scale-105 group-hover:brightness-100 transition-all duration-500">
                @else
                    <div
                        class="w-full h-full flex flex-col items-center justify-center bg-ns-navy-900 text-ns-gold-400 p-6 text-center">
                        <i class="fas fa-book-open text-4xl mb-2 opacity-80" aria-hidden="true"></i>
                        <span class="text-xs font-semibold uppercase tracking-wider text-ns-light-300">Dokumen
                            Jurnal</span>
                    </div>
                @endif
            </div>

            <!-- Card Body -->
            <div class="p-6 flex flex-col flex-1 bg-white">
                <div class="flex items-center justify-between gap-2 mb-1.5">
                    <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700">
                        Publikasi Ilmiah
                    </div>
                </div>
                <div class="flex items-center justify-between gap-2 mb-1.5">
                    <span
                        class="inline-flex items-center gap-1 text-ns-ink-600 bg-ns-ivory px-2 py-0.5 rounded border border-ns-border-light text-[11px] font-semibold"
                        title="Dibaca {{ number_format($row->views ?? 0) }} kali">
                        <i class="far fa-eye text-ns-gold-700" aria-hidden="true"></i>
                        <span>{{ number_format($row->views ?? 0) }}x dibaca</span>
                    </span>
                </div>
                <h3 class="font-display font-bold text-lg text-ns-ink-900 leading-snug mb-3">
                    {{ $row->title }}
                </h3>

                <div class="text-sm text-ns-ink-700 leading-relaxed flex-1 mb-5 line-clamp-3">
                    {{ strip_tags($row->description) }}
                </div>

                <!-- Action Buttons: Lihat File & Unduh PDF -->
                <div class="pt-4 border-t border-ns-border-light flex items-center justify-between gap-3">
                    <a href="{{ route('view-pdf', $row->id) }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-ns-paper text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded border border-[#C8C4BC] hover:bg-ns-navy-900 hover:text-ns-light-100 hover:border-ns-navy-900 transition flex-1 text-center">
                        <i class="far fa-eye" aria-hidden="true"></i>
                        <span>Lihat File</span>
                    </a>

                    <a href="{{ route('download-pdf', $row->id) }}"
                        class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded hover:bg-ns-navy-900 hover:text-ns-gold-400 transition flex-1 text-center shadow-sm">
                        <i class="fas fa-download" aria-hidden="true"></i>
                        <span>Unduh PDF</span>
                    </a>
                </div>
            </div>
        </article>
    @empty
        <div
            class="col-span-full max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
            <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4"
                aria-hidden="true">
                <i class="fas fa-book"></i>
            </div>
            <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">
                @if (!empty($search))
                    Jurnal Tidak Ditemukan
                @else
                    Kami belum memiliki Jurnal
                @endif
            </h4>
            <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                @if (!empty($search))
                    Pencarian dengan kata kunci <span
                        class="font-bold text-ns-navy-900">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan
                    dokumen jurnal.
                @else
                    Berkas jurnal dan publikasi riset hukum sedang dalam proses sinkronisasi dan penataan oleh divisi
                    literatur kami. Anda dapat membaca artikel atau legal opini kami.
                @endif
            </p>
            @if (!empty($search))
                <button type="button" onclick="clearJurnalSearch()"
                    class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                    Reset Pencarian
                </button>
            @else
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('article') }}"
                        class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                        Baca Legal Opini
                    </a>
                    <a href="{{ route('welcome') }}"
                        class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-transparent text-ns-navy-900 font-bold text-xs uppercase tracking-wide rounded border-2 border-ns-navy-900 hover:bg-ns-navy-900 hover:text-ns-light-100 transition">
                        Kembali ke Beranda
                    </a>
                </div>
            @endif
        </div>
    @endforelse
</div>

<!-- Pagination Bar -->
@if ($file->hasPages())
    <div class="mt-12 sm:mt-16 pt-8 border-t border-ns-border-light">
        {{ $file->links('interface.layout.pagination') }}
    </div>
@endif
