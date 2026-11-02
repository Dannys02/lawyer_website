<nav role="navigation" aria-label="Navigasi Halaman Artikel" class="flex flex-col sm:flex-row items-center justify-between gap-4 py-4">
    @if ($paginator->hasPages())
        <!-- Left: Info Summary -->
        <div class="text-xs sm:text-sm text-ns-ink-700">
            Menampilkan
            <span class="font-bold text-ns-ink-900">{{ $paginator->firstItem() }}</span>
            sampai
            <span class="font-bold text-ns-ink-900">{{ $paginator->lastItem() }}</span>
            dari total
            <span class="font-bold text-ns-navy-900">{{ $paginator->total() }}</span>
            artikel
        </div>

        <!-- Right: Pagination Buttons -->
        <ul class="inline-flex items-center gap-1.5 list-none m-0 p-0 flex-wrap justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="inline-flex items-center justify-center min-h-[40px] px-3.5 text-xs font-semibold text-ns-ink-500 bg-white/70 border border-ns-border-light rounded cursor-not-allowed opacity-60">
                        &larr; <span class="hidden sm:inline ml-1">Sebelumnya</span>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                       class="inline-flex items-center justify-center min-h-[40px] px-3.5 text-xs font-bold text-ns-navy-900 bg-white border border-[#C8C4BC] rounded hover:bg-ns-navy-900 hover:text-ns-gold-400 hover:border-ns-navy-900 transition-all shadow-sm">
                        &larr; <span class="hidden sm:inline ml-1">Sebelumnya</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="inline-flex items-center justify-center w-10 min-h-[40px] text-xs font-bold text-ns-ink-500">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="inline-flex items-center justify-center w-10 min-h-[40px] text-xs font-bold text-ns-navy-950 bg-ns-gold-400 border border-ns-gold-400 rounded shadow">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="inline-flex items-center justify-center w-10 min-h-[40px] text-xs font-semibold text-ns-ink-900 bg-white border border-[#C8C4BC] rounded hover:bg-ns-navy-900 hover:text-ns-gold-400 hover:border-ns-navy-900 transition-all shadow-sm">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                       class="inline-flex items-center justify-center min-h-[40px] px-3.5 text-xs font-bold text-ns-navy-900 bg-white border border-[#C8C4BC] rounded hover:bg-ns-navy-900 hover:text-ns-gold-400 hover:border-ns-navy-900 transition-all shadow-sm">
                        <span class="hidden sm:inline mr-1">Selanjutnya</span> &rarr;
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="inline-flex items-center justify-center min-h-[40px] px-3.5 text-xs font-semibold text-ns-ink-500 bg-white/70 border border-ns-border-light rounded cursor-not-allowed opacity-60">
                        <span class="hidden sm:inline mr-1">Selanjutnya</span> &rarr;
                    </span>
                </li>
            @endif
        </ul>
    @endif
</nav>
