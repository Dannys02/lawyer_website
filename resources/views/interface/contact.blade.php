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

            @php
                $soc = $socialmedia ?? $socialMediaData ?? null;
                $waUrl = $soc->wa ?? 'https://wa.link/psypax';
                $igUrl = $soc->instagram ?? '#';
                $tiktokUrl = $soc->tiktok ?? 'https://www.tiktok.com/@pengacara_nurul_safii';
                $fbUrl = $soc->facebook ?? null;
                $officeAddress = $soc->address ?? 'Dusun Muncar Baru, RT.01/RW.05, Desa Tembokrejo, Kec. Muncar, Kabupaten Banyuwangi, Jawa Timur 68472';
            @endphp

            <!-- Direct Directory / List Komunikasi Ringkas & Elegan (Editorial Row Architecture) -->
            <div class="max-w-4xl mx-auto mb-16">
                <div class="bg-white border border-[#C8C4BC] rounded-xl shadow-sm overflow-hidden divide-y divide-ns-border-light">
                    
                    <!-- 1. Alamat Kantor Utama -->
                    <div class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-colors hover:bg-ns-ivory/50">
                        <div class="flex items-start sm:items-center gap-4 min-w-0 sm:w-1/2">
                            <span class="w-11 h-11 rounded-lg bg-ns-navy-950 text-ns-gold-400 flex items-center justify-center text-base shrink-0 shadow-sm border border-ns-navy-800">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </span>
                            <div class="min-w-0">
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-ns-gold-700">Kantor Utama</span>
                                <h3 class="font-display font-bold text-sm sm:text-base text-ns-ink-900 leading-snug">Alamat Kantor Hukum</h3>
                                <p class="text-xs text-ns-ink-600 mt-1 leading-relaxed">
                                    {{ $officeAddress }}
                                </p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 flex sm:justify-end items-center">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-ns-ink-600 bg-ns-ivory px-3 py-1.5 rounded-md border border-ns-border-light">
                                <span>Banyuwangi, Jawa Timur</span>
                            </span>
                        </div>
                    </div>

                    <!-- 2. WhatsApp / Telepon -->
                    <div class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-colors hover:bg-ns-ivory/50">
                        <div class="flex items-start sm:items-center gap-4 min-w-0 sm:w-1/2">
                            <span class="w-11 h-11 rounded-lg bg-ns-navy-950 text-ns-gold-400 flex items-center justify-center text-base shrink-0 shadow-sm border border-ns-navy-800">
                                <i class="fab fa-whatsapp text-lg" aria-hidden="true"></i>
                            </span>
                            <div class="min-w-0">
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-ns-gold-700">Respons Cepat</span>
                                <h3 class="font-display font-bold text-sm sm:text-base text-ns-ink-900 leading-snug">WhatsApp &amp; Telepon</h3>
                                <p class="text-xs text-ns-ink-600 mt-1 leading-relaxed">
                                    Konsultasi perkara langsung &amp; administrasi jadwal.
                                </p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 flex sm:justify-end items-center">
                            <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2 text-xs font-bold text-ns-navy-950 bg-ns-gold-400 hover:bg-ns-navy-900 hover:text-white px-5 py-2.5 rounded-md shadow-sm transition group">
                                <i class="fab fa-whatsapp text-sm" aria-hidden="true"></i>
                                <span>+62 853-3197-9610</span>
                                <span aria-hidden="true" class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- 3. Email Kantor -->
                    <div class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-colors hover:bg-ns-ivory/50">
                        <div class="flex items-start sm:items-center gap-4 min-w-0 sm:w-1/2">
                            <span class="w-11 h-11 rounded-lg bg-ns-navy-950 text-ns-gold-400 flex items-center justify-center text-base shrink-0 shadow-sm border border-ns-navy-800">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </span>
                            <div class="min-w-0">
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-ns-gold-700">Surat Elektronik</span>
                                <h3 class="font-display font-bold text-sm sm:text-base text-ns-ink-900 leading-snug">Korespondensi Resmi</h3>
                                <p class="text-xs text-ns-ink-600 mt-1 leading-relaxed">
                                    Pengiriman berkas perkara &amp; dokumen legal audit.
                                </p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 flex sm:justify-end items-center">
                            <a href="mailto:snurulsafiilawoffice@gmail.com"
                                class="inline-flex items-center gap-2 text-xs font-bold text-ns-navy-900 hover:text-ns-gold-700 bg-ns-ivory hover:bg-white px-4 py-2 rounded-md border border-ns-border-light transition shadow-sm break-all">
                                <span>snurulsafiilawoffice@gmail.com</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- 4. Media Sosial & Kanal Daring -->
                    <div class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-colors hover:bg-ns-ivory/50">
                        <div class="flex items-start sm:items-center gap-4 min-w-0 sm:w-1/2">
                            <span class="w-11 h-11 rounded-lg bg-ns-navy-950 text-ns-gold-400 flex items-center justify-center text-base shrink-0 shadow-sm border border-ns-navy-800">
                                <i class="fas fa-globe" aria-hidden="true"></i>
                            </span>
                            <div class="min-w-0">
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-ns-gold-700">Kanal Publik</span>
                                <h3 class="font-display font-bold text-sm sm:text-base text-ns-ink-900 leading-snug">Media Sosial Resmi</h3>
                                <p class="text-xs text-ns-ink-600 mt-1 leading-relaxed">
                                    Aktivitas persidangan &amp; video edukasi hukum.
                                </p>
                            </div>
                        </div>
                        <div class="sm:w-1/2 flex sm:justify-end items-center gap-2 flex-wrap">
                            <a href="{{ $igUrl }}" target="_blank" rel="noopener noreferrer"
                                title="Instagram Resmi"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-ns-ivory hover:bg-ns-navy-900 text-ns-ink-800 hover:text-white border border-ns-border-light text-xs font-semibold transition shadow-sm">
                                <i class="fab fa-instagram text-ns-gold-600"></i>
                                <span>Instagram</span>
                            </a>
                            <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer"
                                title="TikTok Edukasi Hukum"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-ns-ivory hover:bg-ns-navy-900 text-ns-ink-800 hover:text-white border border-ns-border-light text-xs font-semibold transition shadow-sm">
                                <i class="fab fa-tiktok text-ns-gold-600"></i>
                                <span>TikTok</span>
                            </a>
                            @if (!empty($fbUrl))
                                <a href="{{ $fbUrl }}" target="_blank" rel="noopener noreferrer"
                                    title="Facebook Resmi"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-ns-ivory hover:bg-ns-navy-900 text-ns-ink-800 hover:text-white border border-ns-border-light text-xs font-semibold transition shadow-sm">
                                    <i class="fab fa-facebook-f text-ns-gold-600"></i>
                                    <span>Facebook</span>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
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
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Flash Alert Error / Anti-Spam Rate Limit -->
            @if(session('error'))
                <div class="mb-8 p-4 rounded-lg bg-red-950 border-2 border-red-500 text-red-100 text-sm flex items-center gap-3" role="alert">
                    <i class="fas fa-shield-alt text-red-400 text-lg flex-shrink-0" aria-hidden="true"></i>
                    <div>
                        <strong class="font-bold">Pengiriman Dibatasi:</strong>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Review Card Form -->
            <div class="bg-ns-navy-950 border-2 border-ns-gold-400/40 rounded-xl p-6 sm:p-10 shadow-2xl">
                <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm" class="space-y-6">
                    @csrf

                    <!-- Time-trap Encrypted Timestamp -->
                    <input type="hidden" name="_form_rendered_at" value="{{ \Illuminate\Support\Facades\Crypt::encryptString((string) time()) }}">

                    <!-- Honeypot Field (Hidden from real users & screen readers, traps automated bots) -->
                    <div class="sr-only" aria-hidden="true">
                        <label for="website_url">Jangan isi kolom ini jika Anda manusia</label>
                        <input type="text" id="website_url" name="website_url" value="" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2">
                            Nama Lengkap / Inisial Klien <span class="text-red-400">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               minlength="2"
                               maxlength="60"
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
                    <fieldset>
                        <legend class="block w-full text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2 text-center">
                            Penilaian Layanan (Rating Bintang) <span class="text-red-400">*</span>
                        </legend>
                        <div class="flex justify-center items-center py-2">
                            <div class="ns-star-rating flex flex-row-reverse gap-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} class="sr-only" required>
                                    <label for="star{{ $i }}" title="{{ $i }} Bintang" class="cursor-pointer min-w-[44px] min-h-[44px] inline-flex items-center justify-center rounded-md text-3xl sm:text-4xl text-slate-500 hover:text-ns-gold-400 transition-colors">
                                        <span aria-hidden="true">&#9733;</span>
                                        <span class="sr-only">{{ $i }} Bintang</span>
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
                    </fieldset>

                    <!-- Review Message -->
                    <div>
                        <label for="message" class="block text-xs font-bold uppercase tracking-wider text-ns-gold-400 mb-2">
                            Ulasan &amp; Pengalaman Anda <span class="text-red-400">*</span>
                        </label>
                        <textarea id="message"
                                  name="message"
                                  rows="4"
                                  minlength="10"
                                  maxlength="200"
                                  placeholder="Ceritakan pengalaman Anda selama berkonsultasi atau didampingi oleh tim advokat kami..."
                                  required
                                  class="w-full px-4 py-3 bg-ns-navy-900 text-sm text-ns-light-100 placeholder:text-ns-ink-500 border border-ns-gold-400/30 rounded-lg focus:outline-none focus:border-ns-gold-400 focus:ring-1 focus:ring-ns-gold-400 transition @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        <div class="flex justify-between items-center text-[11px] text-ns-light-300 mt-1">
                            <span>Minimal 10, maksimal 200 karakter (tanpa tautan/link)</span>
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
                                id="reviewSubmitBtn"
                                class="inline-flex items-center justify-center min-h-[48px] px-8 py-3 bg-ns-gold-400 text-ns-navy-950 font-bold text-sm tracking-wide uppercase rounded hover:bg-white hover:text-ns-navy-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-ns-gold-400 disabled:opacity-60 disabled:cursor-not-allowed transition-all duration-150 shadow-lg cursor-pointer">
                            <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i>
                            <span id="reviewSubmitText">Kirim Ulasan Anda</span>
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
    /* Pure CSS Star Rating Highlight Effect & Keyboard Focus Ring */
    .ns-star-rating input:checked ~ label,
    .ns-star-rating label:hover,
    .ns-star-rating label:hover ~ label {
        color: #E2B842 !important;
        text-shadow: 0 0 10px rgba(226, 184, 66, 0.4);
    }
    .ns-star-rating input:focus-visible + label {
        outline: 2px solid #E2B842;
        outline-offset: 2px;
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

        const reviewForm = document.getElementById('reviewForm');
        const submitBtn = document.getElementById('reviewSubmitBtn');
        const submitText = document.getElementById('reviewSubmitText');
        if (reviewForm && submitBtn && submitText) {
            reviewForm.addEventListener('submit', function () {
                submitBtn.disabled = true;
                submitText.textContent = 'Mengirim Ulasan...';
            });
        }
    });
</script>
@endpush
