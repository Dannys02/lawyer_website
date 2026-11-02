@extends('interface.layout.app')
@section('title', 'Kontak & Konsultasi Hukum | Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners')

@section('content')
    <!--================ Start Page Banner Area (Editorial Navy & Gold) =================-->
    <section class="relative bg-ns-navy-950 text-ns-light-100 pt-28 sm:pt-36 pb-16 sm:pb-20 overflow-hidden border-b-4 border-ns-gold-500" aria-labelledby="contact-banner-heading">
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
                    <span class="text-ns-gold-400" aria-current="page">Kontak Kami</span>
                </nav>

                <p class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-bold tracking-widest uppercase text-ns-gold-400 mb-2">
                    <span class="inline-block w-8 sm:w-10 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    KOMUNIKASI &amp; KONSULTASI HUKUM
                </p>
                <h1 id="contact-banner-heading" class="font-serif font-bold text-3xl sm:text-4xl md:text-5xl text-ns-light-100 leading-tight tracking-tight mb-3">
                    Hubungi <span class="text-ns-gold-400">Kantor Kami</span>
                </h1>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed max-w-2xl">
                    Kami percaya bahwa setiap permasalahan hukum memiliki jalan keluar yang terukur. Izinkan tim advokat kami menjadi garda terpercaya pembela hak Anda.
                </p>
            </div>
        </div>
    </section>
    <!--================ End Page Banner Area =================-->

    <!--================ Start Contact & Information Section =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-paper border-b border-ns-border-light" id="kontak-informasi" aria-labelledby="contact-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                    <span>Saluran Komunikasi Resmi</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-700" aria-hidden="true"></span>
                </div>
                <h2 id="contact-heading" class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-ink-900 mb-3">
                    Akses Mudah &amp; Respons Cepat
                </h2>
                <p class="text-sm sm:text-base text-ns-ink-700 leading-relaxed">
                    Kunjungi kantor kami atau hubungi melalui kanal daring resmi berikut untuk jadwal konsultasi perkara Anda.
                </p>
            </div>

            <!-- Contact Cards Grid (5 Saluran Komunikasi Elegan) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Alamat Kantor -->
                <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-900 text-ns-gold-400 flex items-center justify-center text-xl mb-4 shadow">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">Kantor Utama</div>
                        <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-2">Alamat Kantor Hukum</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed">
                            Dusun Muncar Baru, RT.01/RW.05, Desa Tembokrejo, Kec. Muncar, Kabupaten Banyuwangi, Jawa Timur 68472
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-ns-border-light text-xs font-semibold text-ns-ink-500">
                        Banyuwangi &amp; Jawa Timur
                    </div>
                </article>

                <!-- WhatsApp / Telepon -->
                <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-900 text-ns-gold-400 flex items-center justify-center text-xl mb-4 shadow">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">WhatsApp &amp; Telepon</div>
                        <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-2">Konsultasi Langsung</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-4">
                            Layanan konsultasi perkara dan administrasi berkas perkara melalui WhatsApp resmi.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-ns-border-light">
                        <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                            <span>+62 853-3197-9610</span>
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>

                <!-- Email Kantor -->
                <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-900 text-ns-gold-400 flex items-center justify-center text-xl mb-4 shadow">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">Surat Elektronik</div>
                        <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-2">Korespondensi Resmi</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-4">
                            Pengiriman berkas perkara, dokumen legal audit, serta undangan kerjasama institusional.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-ns-border-light">
                        <a href="mailto:snurulsafiilawoffice@gmail.com" class="inline-flex items-center gap-2 text-sm font-bold text-ns-navy-900 hover:text-ns-gold-700 transition break-all">
                            <span>snurulsafiilawoffice@gmail.com</span>
                        </a>
                    </div>
                </article>

                <!-- Instagram -->
                <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-900 text-ns-gold-400 flex items-center justify-center text-xl mb-4 shadow">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">Media Sosial</div>
                        <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-2">Instagram Resmi</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-4">
                            Dokumentasi aktivitas persidangan, edukasi hukum harian, dan kegiatan sosial firma.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-ns-border-light">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                            <span>@nurulsafiilaw</span>
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>

                <!-- TikTok -->
                <article class="bg-white border border-[#C8C4BC] border-t-4 border-t-ns-navy-900 rounded-lg p-6 sm:p-7 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-t-ns-gold-500 hover:shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-900 text-ns-gold-400 flex items-center justify-center text-xl mb-4 shadow">
                            <i class="fab fa-tiktok" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-700 mb-1">Edukasi Video</div>
                        <h3 class="font-display font-bold text-lg text-ns-ink-900 mb-2">TikTok Edukasi Hukum</h3>
                        <p class="text-sm text-ns-ink-700 leading-relaxed mb-4">
                            Video penjelasan singkat seputar hak hukum masyarakat, sengketa, dan undang-undang.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-ns-border-light">
                        <a href="https://www.tiktok.com/@pengacara_nurul_safii" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-bold text-ns-navy-900 hover:text-ns-gold-700 transition">
                            <span>@pengacara_nurul_safii</span>
                            <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>

                <!-- Jam Layanan Kantor -->
                <article class="bg-ns-navy-900 text-ns-light-100 border border-ns-navy-800 border-t-4 border-t-ns-gold-400 rounded-lg p-6 sm:p-7 shadow-md flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-lg bg-ns-navy-800 border border-ns-gold-400 text-ns-gold-400 flex items-center justify-center text-xl mb-4">
                            <i class="far fa-clock" aria-hidden="true"></i>
                        </div>
                        <div class="text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-1">Jam Operasional</div>
                        <h3 class="font-display font-bold text-lg text-ns-light-100 mb-2">Waktu Layanan Kantor</h3>
                        <ul class="text-xs sm:text-sm text-ns-light-300 space-y-1.5 list-none p-0 m-0">
                            <li class="flex justify-between"><span>Senin &ndash; Jumat:</span> <strong class="text-ns-gold-400">08.00 &ndash; 17.00 WIB</strong></li>
                            <li class="flex justify-between"><span>Sabtu:</span> <strong class="text-ns-light-100">09.00 &ndash; 14.00 WIB</strong></li>
                            <li class="flex justify-between"><span>Minggu / Tanggal Merah:</span> <span class="italic text-ns-light-300">Dengan Perjanjian</span></li>
                        </ul>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 text-[11px] text-ns-gold-400 font-semibold">
                        *Layanan gawat darurat perkara pidana 24 Jam via WhatsApp
                    </div>
                </article>
            </div>

            <!-- Google Maps Embed Modern Frame -->
            <div class="rounded-xl overflow-hidden border-2 border-ns-border-light shadow-md bg-white">
                <div class="bg-ns-navy-900 px-6 py-4 flex items-center justify-between text-ns-light-100 border-b border-ns-gold-500/40">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-map-marked-alt text-ns-gold-400 text-lg" aria-hidden="true"></i>
                        <span class="font-display font-bold text-sm sm:text-base">Lokasi Kantor Hukum di Google Maps</span>
                    </div>
                    <a href="https://maps.google.com/?q=-8.4335819,114.331305" target="_blank" rel="noopener noreferrer" class="text-xs font-bold text-ns-gold-400 hover:text-white transition inline-flex items-center gap-1">
                        <span>Buka di Aplikasi</span>
                        <i class="fas fa-external-link-alt text-[10px]" aria-hidden="true"></i>
                    </a>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3946.6745860375327!2d114.331305!3d-8.4335819!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd3fda7e9c9fed5%3A0xdb0214b9aa109fa5!2spengacara%20%2F%20Advokat%20Nurul%20Safi&#39;i%2C%20S.H!5e0!3m2!1sid!2sid!4v1752230759071!5m2!1sid!2sid"
                    width="100%" height="420" class="border-0 w-full block" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Kantor Hukum Nurul Safii Banyuwangi"></iframe>
            </div>
        </div>
    </section>
    <!--================ End Contact & Information Section =================-->

    <!--================ Start Review Submission Section (Editorial Navy Authority) =================-->
    <section class="py-16 sm:py-20 lg:py-24 bg-ns-navy-900 text-ns-light-100 border-b-4 border-ns-gold-500" id="review-form" aria-labelledby="review-form-heading">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Review Heading -->
            <div class="text-center max-w-2xl mx-auto mb-10">
                <div class="inline-flex items-center gap-2.5 text-xs font-bold uppercase tracking-widest text-ns-gold-400 mb-2">
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                    <span>Suara &amp; Evaluasi Klien</span>
                    <span class="inline-block w-6 h-0.5 bg-ns-gold-400" aria-hidden="true"></span>
                </div>
                <h2 id="review-form-heading" class="font-serif font-bold text-2xl sm:text-3xl lg:text-4xl text-ns-light-100 mb-3">
                    Berikan Ulasan &amp; Penilaian Anda
                </h2>
                <p class="text-sm sm:text-base text-ns-light-300 leading-relaxed">
                    Masukan dan pengalaman Anda selama menerima pendampingan hukum sangat berarti bagi peningkatan mutu layanan kami.
                </p>
            </div>

            <!-- Flash Alert Success -->
            @if(session('success'))
                <div class="mb-8 p-4 rounded-lg bg-emerald-950 border-2 border-emerald-500 text-emerald-200 text-sm flex items-center gap-3" role="alert">
                    <i class="fas fa-check-circle text-emerald-400 text-lg flex-shrink-0" aria-hidden="true"></i>
                    <div>
                        <strong class="font-bold">Terima kasih!</strong>
                        <span>{{ session('success') }} Ulasan Anda telah berhasil disimpan dan dipublikasikan.</span>
                    </div>
                </div>
            @endif

            <!-- Review Card Form -->
            <div class="bg-ns-navy-950 border-2 border-ns-gold-400/40 rounded-xl p-6 sm:p-10 shadow-2xl">
                <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm" class="space-y-6">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2">
                            Nama Lengkap / Inisial Klien <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Contoh: Budi Santoso / B.S."
                               required
                               class="w-full px-4 py-3 bg-ns-navy-900 text-sm text-ns-light-100 placeholder:text-ns-ink-500 border border-ns-gold-400/30 rounded-lg focus:outline-none focus:border-ns-gold-400 focus:ring-1 focus:ring-ns-gold-400 transition @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Star Rating Interactive Selection -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2 text-center">
                            Penilaian Layanan (Rating Bintang) <span class="text-red-400">*</span>
                        </label>
                        <div class="flex justify-center items-center py-2">
                            <div class="ns-star-rating flex flex-row-reverse gap-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} class="sr-only" required>
                                    <label for="star{{ $i }}" title="{{ $i }} Bintang" class="cursor-pointer text-3xl sm:text-4xl text-slate-600 hover:text-ns-gold-400 transition-colors">
                                        &#9733;
                                    </label>
                                @endfor
                            </div>
                        </div>
                        @error('rating')
                            <p class="mt-1.5 text-xs text-red-400 text-center flex items-center justify-center gap-1">
                                <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Review Message -->
                    <div>
                        <label for="message" class="block text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2">
                            Ulasan &amp; Pengalaman Anda <span class="text-red-400">*</span>
                        </label>
                        <textarea id="message"
                                  name="message"
                                  rows="4"
                                  maxlength="200"
                                  placeholder="Ceritakan pengalaman Anda selama berkonsultasi atau didampingi oleh tim advokat kami..."
                                  required
                                  class="w-full px-4 py-3 bg-ns-navy-900 text-sm text-ns-light-100 placeholder:text-ns-ink-500 border border-ns-gold-400/30 rounded-lg focus:outline-none focus:border-ns-gold-400 focus:ring-1 focus:ring-ns-gold-400 transition @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        <div class="flex justify-between items-center text-[11px] text-ns-light-300/70 mt-1">
                            <span>Maksimal 200 karakter</span>
                            <span id="char-count">0 / 200</span>
                        </div>
                        @error('message')
                            <p class="mt-1.5 text-xs text-red-400 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center pt-2">
                        <button type="submit"
                                class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-ns-gold-400 text-ns-navy-950 font-bold text-sm tracking-wide uppercase rounded hover:bg-white hover:text-ns-navy-900 transition-all duration-150 shadow-lg">
                            <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i>
                            <span>Kirim Ulasan Anda</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================ End Review Submission Section =================-->
@endsection

@push('styles')
<style>
    /* Pure CSS Star Rating Highlight Effect */
    .ns-star-rating input:checked ~ label,
    .ns-star-rating label:hover,
    .ns-star-rating label:hover ~ label {
        color: #E2B842 !important;
        text-shadow: 0 0 10px rgba(226, 184, 66, 0.4);
    }
</style>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById('message');
        const charCount = document.getElementById('char-count');
        if (textarea && charCount) {
            function updateCount() {
                charCount.textContent = textarea.value.length + ' / 200';
            }
            textarea.addEventListener('input', updateCount);
            updateCount();
        }
    });
</script>
@endpush
