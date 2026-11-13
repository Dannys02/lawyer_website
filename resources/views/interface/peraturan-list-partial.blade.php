<!-- Daftar Card Peraturan (Panjang dari Kiri ke Kanan, Berurutan Atas ke Bawah) -->
<div class="space-y-5">
    @forelse ($file as $index => $row)
        @php
            $cleanDesc = trim(preg_replace('/\s+/', ' ', strip_tags($row->deskripsi ?? '')));
        @endphp
        <article
            class="bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-xl p-5 sm:p-6 shadow-sm hover:shadow-md hover:border-l-ns-gold-500 transition-all duration-200">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
                <!-- Kolom Informasi (Kiri) -->
                <div class="flex-1 min-w-0">
                    <!-- Badges Row: Jenis Peraturan & Status -->
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-ns-ivory text-ns-gold-800 border border-ns-border-light">
                            <i class="fas fa-balance-scale mr-1.5 text-ns-gold-600" aria-hidden="true"></i>
                            {{ $row->jenis_peraturan }}
                        </span>

                        @if ($row->status === 'Berlaku')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ $row->status }}
                            </span>
                        @elseif ($row->status === 'Diubah')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                {{ $row->status }}
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                {{ $row->status }}
                            </span>
                        @endif

                        <span class="text-xs text-ns-ink-500 font-medium">
                            Nomor {{ $row->nomor }} Tahun {{ $row->tahun }}
                            @if ($row->tanggal_pengundangan)
                                &bull; Diundangkan: {{ $row->tanggal_pengundangan->locale('id')->isoFormat('D MMMM Y') }}
                            @endif
                        </span>

                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-ns-ink-600 bg-ns-ivory px-2 py-0.5 rounded border border-ns-border-light" title="Dibaca {{ number_format($row->views ?? 0) }} kali">
                            <i class="far fa-eye text-ns-gold-700" aria-hidden="true"></i>
                            <span>{{ number_format($row->views ?? 0) }}x dibaca</span>
                        </span>
                    </div>

                    <!-- Judul / Tentang -->
                    <h3 class="font-display font-bold text-base sm:text-lg text-ns-ink-900 leading-snug mb-2 hover:text-ns-gold-700 transition">
                        <a href="{{ route('peraturan.detail', $row->id) }}">
                            {{ $row->jenis_peraturan }} Nomor {{ $row->nomor }} Tahun {{ $row->tahun }} tentang {{ $row->tentang }}
                        </a>
                    </h3>

                    <!-- Deskripsi Ringkas (Maksimal 2 baris kalimat terpotong rapi) -->
                    <p class="text-xs sm:text-sm text-ns-ink-700 leading-relaxed line-clamp-2">
                        {{ !empty($cleanDesc) ? $cleanDesc : 'Dokumen instrumen peraturan perundang-undangan resmi Republik Indonesia.' }}
                    </p>
                </div>

                <!-- Kolom Tombol Aksi (Kanan Bawah) -->
                <div class="flex items-center justify-end gap-3 flex-shrink-0 pt-3 lg:pt-0 border-t lg:border-t-0 border-ns-border-light/70">
                    <a href="{{ route('peraturan.detail', $row->id) }}"
                        class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-ns-paper text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded-lg border border-[#C8C4BC] hover:bg-ns-navy-900 hover:text-ns-light-100 hover:border-ns-navy-900 transition text-center shadow-sm">
                        <i class="fas fa-info-circle text-ns-gold-600" aria-hidden="true"></i>
                        <span>Lihat Detail</span>
                    </a>

                    @if ($row->file_path)
                        <a href="{{ route('download-pdf', $row->id) }}"
                            class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-ns-navy-900 hover:text-ns-gold-400 transition text-center shadow-sm">
                            <i class="fas fa-download" aria-hidden="true"></i>
                            <span>Unduh</span>
                        </a>
                    @else
                        <button type="button" disabled title="Berkas PDF belum tersedia"
                            class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-slate-100 text-slate-400 font-bold text-xs uppercase tracking-wider rounded-lg border border-slate-200 cursor-not-allowed">
                            <i class="fas fa-download" aria-hidden="true"></i>
                            <span>Unduh</span>
                        </button>
                    @endif
                </div>
            </div>
        </article>
    @empty
        <div
            class="max-w-xl mx-auto w-full bg-white border border-[#C8C4BC] border-l-4 border-l-ns-navy-900 rounded-xl p-8 sm:p-10 text-center shadow-sm">
            <div class="w-14 h-14 rounded-full bg-ns-ivory border border-ns-border-light text-ns-navy-900 inline-flex items-center justify-center text-2xl mb-4"
                aria-hidden="true">
                <i class="fas fa-balance-scale"></i>
            </div>
            <h4 class="font-display font-bold text-xl text-ns-ink-900 mb-2">
                @if (!empty($search))
                    Peraturan Tidak Ditemukan
                @else
                    Belum Ada Peraturan
                @endif
            </h4>
            <p class="text-sm text-ns-ink-700 leading-relaxed mb-6">
                @if (!empty($search))
                    Pencarian dengan kata kunci <span
                        class="font-bold text-ns-navy-900">&ldquo;{{ $search }}&rdquo;</span> tidak menemukan
                    dokumen peraturan yang sesuai.
                @else
                    Koleksi dokumen peraturan perundang-undangan dan telaah hukum sedang dalam proses sinkronisasi dan penataan oleh divisi kami.
                @endif
            </p>
            @if (!empty($search))
                <button type="button" onclick="clearPeraturanSearch()"
                    class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                    Reset Pencarian
                </button>
            @else
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('article') }}"
                        class="inline-flex items-center justify-center min-h-[44px] px-6 py-2.5 bg-ns-navy-900 text-ns-light-100 font-bold text-xs uppercase tracking-wide rounded hover:bg-ns-navy-800 transition">
                        Baca Artikel &amp; Legal Opini
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
    <div class="mt-10 sm:mt-12 pt-6 border-t border-ns-border-light">
        {{ $file->links('interface.layout.pagination') }}
    </div>
@endif
