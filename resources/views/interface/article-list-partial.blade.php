<!-- Grid 3 Kolom Sejajar Konsisten -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
    @forelse($articles as $index => $row)
        <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg overflow-hidden flex flex-col shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl group">
            <!-- Thumbnail Media -->
            <div class="relative bg-ns-navy-950 aspect-[16/10] overflow-hidden">
                @if (!empty($row->picture))
                    <img src="{{ asset('storage/' . $row->picture) }}"
                         alt="Gambar {{ $row->title }}"
                         width="540" height="340"
                         loading="lazy" decoding="async"
                         class="w-full h-full object-cover object-top filter brightness-95 group-hover:scale-105 group-hover:brightness-100 transition-all duration-500">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-ns-navy-900 text-ns-gold-400 p-6 text-center">
                        <i class="fas fa-balance-scale text-4xl mb-2 opacity-80" aria-hidden="true"></i>
                        <span class="text-xs font-semibold uppercase tracking-wider text-ns-light-300">Legal Opini</span>
                    </div>
                @endif

                <!-- Index Badge -->
                <span class="absolute top-3 left-3 bg-ns-navy-950/90 text-ns-gold-400 border border-ns-gold-400/60 font-display font-bold text-xs px-2.5 py-1 rounded backdrop-blur-sm shadow-md" aria-hidden="true">
                    {{ sprintf('%02d', ($articles->currentPage() - 1) * $articles->perPage() + $index + 1) }}
                </span>

                <!-- Tag Badge -->
                <span class="absolute top-3 right-3 bg-ns-navy-900/90 text-ns-light-100 font-sans font-bold text-[10px] uppercase tracking-wider px-2.5 py-1 rounded border border-white/20 backdrop-blur-sm">
                    Opini Hukum
                </span>
            </div>

            <!-- Card Body -->
            <div class="p-6 flex flex-col flex-1 bg-white">
                <!-- Metadata: Date & Author -->
                <div class="flex flex-wrap items-center gap-2 text-xs font-semibold text-ns-ink-500 mb-2.5">
                    <time datetime="{{ \Carbon\Carbon::parse($row->date_publish)->format('Y-m-d') }}" class="text-ns-gold-700 font-bold">
                        <i class="far fa-calendar-alt mr-1" aria-hidden="true"></i>
                        {{ \Carbon\Carbon::parse($row->date_publish)->format('d F Y') }}
                    </time>
                    <span class="text-ns-border-light" aria-hidden="true">&bull;</span>
                    <span class="truncate max-w-[200px]" title="{{ $row->author }}">
                        <i class="far fa-user mr-1" aria-hidden="true"></i>
                        {{ $row->author }}
                    </span>
                </div>

                <!-- Article Title -->
                <h3 class="font-display font-bold text-lg sm:text-xl text-ns-ink-900 leading-snug mb-4 flex-1">
                    <a href="{{ route('article.show', $row->slug) }}"
                       class="hover:text-ns-gold-700 transition-colors">
                        {{ $row->title }}
                    </a>
                </h3>

                <!-- Card Footer Action with Read More Button -->
                <div class="pt-4 border-t border-ns-border-light flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-ns-ink-500 uppercase tracking-wider">
                        {{ !empty($row->publisher) ? $row->publisher : 'Nurul Safii & Partners' }}
                    </span>
                    <a href="{{ route('article.show', $row->slug) }}"
                       class="inline-flex items-center gap-1.5 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                        <span>Baca Selengkapnya</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </article>
    @empty
        <div class="col-span-full max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-lg p-8 sm:p-10 text-center shadow-sm">
            <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4" aria-hidden="true">
                <i class="far fa-newspaper"></i>
            </div>
            <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">
                @if(!empty($search))
                    Tidak Ada Artikel yang Cocok
                @else
                    Kami belum memiliki artikel
                @endif
            </h4>
            <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                @if(!empty($search))
                    Pencarian dengan kata kunci <span class="font-bold text-ns-navy-900">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan hasil. Coba gunakan kata kunci lain seperti &ldquo;perdata&rdquo;, &ldquo;pidana&rdquo;, atau &ldquo;tanah&rdquo;.
                @else
                    Artikel edukasi dan legal opini sedang dalam proses penyusunan oleh tim advokat kami.
                @endif
            </p>
            @if(!empty($search))
                <button type="button" onclick="clearSearchInput()" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                    Reset Pencarian
                </button>
            @else
                <a href="{{ route('welcome') }}" class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                    Kembali ke Beranda
                </a>
            @endif
        </div>
    @endforelse
</div>

<!-- Pagination Bar -->
@if ($articles->hasPages())
    <div class="mt-12 sm:mt-16 pt-8 border-t border-ns-border-light">
        {{ $articles->links('interface.layout.pagination') }}
    </div>
@endif
