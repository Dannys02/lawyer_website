@extends('auth.layouts.app')

@section('contents')
<div class="min-h-screen flex flex-col lg:flex-row w-full relative overflow-hidden bg-ns-navy-950">

    {{-- Sisi Kiri: Visual Sinematik & Identitas Firma (Hanya layar desktop lg ke atas) --}}
    <div class="hidden lg:flex lg:w-7/12 relative items-center justify-center p-12 overflow-hidden border-r border-ns-gold-400/15">
        {{-- Background Image dengan Zoom Halus & Tone Navy Berwibawa --}}
        <img src="{{ asset('interface/img/1.jpg') }}"
             alt="Nurul Syafii Law Firm"
             class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.38] contrast-[1.08] scale-105" />

        {{-- Gradient Overlay Bertingkat --}}
        <div class="absolute inset-0 bg-gradient-to-t from-ns-navy-950 via-ns-navy-950/70 to-ns-navy-950/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-ns-navy-950/20 to-ns-navy-950"></div>

        {{-- Pattern Aksen Garis Emas --}}
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-ns-gold-500 via-ns-gold-400 to-transparent"></div>

        {{-- Konten Showcase Sisi Kiri --}}
        <div class="relative z-10 max-w-xl text-center lg:text-left space-y-8 px-6">
            {{-- Logo Brand --}}
            <a href="{{ route('welcome') }}" class="inline-block transition-transform duration-300 hover:scale-[1.02]" title="Kembali ke Beranda">
                <img src="{{ asset('interface/img/LOGO_NS.png') }}"
                     alt="Kantor Hukum Nurul Syafii"
                     class="h-16 w-auto filter drop-shadow-[0_4px_20px_rgba(212,175,55,0.25)]" />
            </a>

            <div class="space-y-4">
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-ns-navy-900/80 border border-ns-gold-400/30 text-ns-gold-300 text-xs tracking-wider uppercase">
                    <!-- SVG Scale Balanced (Timbangan Keadilan) -->
                    <svg class="w-4 h-4 text-ns-gold-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                        <path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                        <path d="M7 21h10"/>
                        <path d="M12 3v18"/>
                        <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                    </svg>
                    <span>Portal Akses Terpadu</span>
                </div>
                <h1 class="font-serif-heading text-3xl xl:text-4xl text-white font-bold tracking-tight leading-snug">
                    Integritas, Keadilan &amp; Profesionalisme
                </h1>
                <p class="text-slate-300 text-sm xl:text-base leading-relaxed font-light">
                    Sistem administrasi internal kantor hukum untuk pengelolaan manajemen perkara, informasi publik, layanan konsultasi hukum, dan publikasi edukasi yuridis terpercaya.
                </p>
            </div>
        </div>

        {{-- Footer Sisi Kiri --}}
        <div class="absolute bottom-6 left-12 right-12 z-10 flex items-center justify-between text-xs text-slate-500">
            <span>&copy; {{ date('Y') }} Kantor Hukum Nurul Syafii. All rights reserved.</span>
            <span class="text-ns-gold-400/70 font-serif-heading tracking-wider">JUSTITIA ET FIDES</span>
        </div>
    </div>

    {{-- Sisi Kanan: Form Login Admin --}}
    <div class="flex-1 flex flex-col justify-center items-center p-6 sm:p-12 lg:p-16 relative z-10 bg-gradient-to-b from-ns-navy-900/90 via-ns-navy-950 to-ns-navy-950">

        {{-- Mobile Logo Header (hanya muncul di layar mobile & tablet) --}}
        <div class="lg:hidden mb-8 text-center">
            <a href="{{ route('welcome') }}" class="inline-block transition-transform duration-300 hover:scale-105" title="Kembali ke Beranda">
                <img src="{{ asset('interface/img/LOGO_NS.png') }}"
                     alt="Kantor Hukum Nurul Syafii"
                     class="h-12 w-auto mx-auto filter drop-shadow-[0_2px_12px_rgba(212,175,55,0.25)]" />
            </a>
        </div>

        {{-- Card Wrapper Form Login --}}
        <div class="w-full max-w-md mx-auto">
            <div class="relative bg-ns-navy-900/70 backdrop-blur-xl border border-ns-gold-400/25 rounded-2xl p-7 sm:p-9 shadow-[0_20px_50px_rgba(0,0,0,0.6)]">

                {{-- Aksen Garis Emas Puncak Kartu --}}
                <div class="absolute top-0 left-8 right-8 h-[2px] bg-gradient-to-r from-transparent via-ns-gold-400 to-transparent"></div>

                {{-- Header Form --}}
                <div class="mb-8 text-center sm:text-left">
                    <div class="inline-flex lg:hidden items-center gap-2 px-3 py-1 rounded-full bg-ns-navy-800/80 border border-ns-gold-400/30 text-ns-gold-400 text-xs mb-3">
                        <!-- SVG User Shield -->
                        <svg class="w-3.5 h-3.5 text-ns-gold-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                            <path d="M12 8a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"/>
                        </svg>
                        <span>Admin Gateway</span>
                    </div>
                    <h4 class="font-serif-heading text-2xl sm:text-3xl text-white font-bold tracking-tight mb-2">
                        Selamat Datang Admin
                    </h4>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Mohon login untuk masuk kedalam mode admin
                    </p>
                </div>

                {{-- Form Element --}}
                <form id="formAuthentication"
                      class="space-y-6"
                      action="{{ route('login') }}"
                      method="POST"
                      onsubmit="document.getElementById('loading-screen').style.display = 'flex';">
                    @csrf

                    {{-- Field Email --}}
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <!-- SVG Envelope / Mail -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </div>
                            <input
                                type="email"
                                class="w-full pl-10 pr-4 py-3 bg-ns-navy-950/80 border @error('email') border-red-500/80 focus:border-red-500 focus:ring-red-500/30 @else border-slate-700/80 focus:border-ns-gold-400 focus:ring-ns-gold-400/25 @enderror rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 transition-all duration-200"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                autocomplete="email"
                                autofocus
                                required />
                        </div>
                        @error('email')
                            <span class="mt-2 text-xs text-red-400 flex items-center gap-1.5" role="alert">
                                <!-- SVG Alert Triangle -->
                                <svg class="w-3.5 h-3.5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="12" x2="12" y1="8" y2="12"/>
                                    <line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Field Password dengan Toggle Eye --}}
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2" for="password">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <!-- SVG Lock -->
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </div>
                            <input
                                type="password"
                                id="password"
                                class="w-full pl-10 pr-12 py-3 bg-ns-navy-950/80 border @error('password') border-red-500/80 focus:border-red-500 focus:ring-red-500/30 @else border-slate-700/80 focus:border-ns-gold-400 focus:ring-ns-gold-400/25 @enderror rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 transition-all duration-200"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                                required />
                            <button
                                type="button"
                                id="togglePasswordBtn"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-ns-gold-400 transition-colors focus:outline-none cursor-pointer"
                                aria-label="Tampilkan / Sembunyikan Password">
                                <!-- SVG Eye Slash (Password Tersembunyi Default) -->
                                <svg id="togglePasswordIconSlash" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m15 18-.722-3.25"/>
                                    <path d="M2 8a10.645 10.645 0 0 0 20 0"/>
                                    <path d="m20 15-1.726-2.05"/>
                                    <path d="m4 15 1.726-2.05"/>
                                    <path d="m9 18 .722-3.25"/>
                                </svg>
                                <!-- SVG Eye (Password Tampil) -->
                                <svg id="togglePasswordIconEye" class="w-4 h-4 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="mt-2 text-xs text-red-400 flex items-center gap-1.5" role="alert">
                                <!-- SVG Alert Triangle -->
                                <svg class="w-3.5 h-3.5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="12" x2="12" y1="8" y2="12"/>
                                    <line x1="12" x2="12.01" y1="16" y2="16"/>
                                </svg>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Tombol Submit Sign in --}}
                    <div class="pt-2">
                        <button
                            class="w-full py-3.5 px-6 rounded-lg bg-ns-gold-500 text-ns-navy-950 font-semibold text-sm uppercase tracking-wider hover:brightness-110 active:scale-[0.99] transition-all duration-200 shadow-[0_4px_20px_rgba(212,175,55,0.3)] cursor-pointer flex items-center justify-center gap-2 group"
                            type="submit">
                            <span>Sign in</span>
                            <!-- SVG Arrow Right -->
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <polyline points="10 17 15 12 10 7"/>
                                <line x1="15" x2="3" y1="12" y2="12"/>
                            </svg>
                        </button>
                    </div>
                </form>

                {{-- Tautan Balik ke Beranda --}}
                <div class="mt-6 pt-5 border-t border-slate-800 text-center">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-xs text-slate-400 hover:text-ns-gold-400 transition-colors duration-200">
                        <!-- SVG Arrow Left -->
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m12 19-7-7 7-7"/>
                            <path d="M19 12H5"/>
                        </svg>
                        <span>Kembali ke Website Utama</span>
                    </a>
                </div>

            </div>
        </div>

        {{-- Mobile Footer --}}
        <div class="lg:hidden mt-8 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Kantor Hukum Nurul Syafii
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const iconEye = document.getElementById('togglePasswordIconEye');
        const iconSlash = document.getElementById('togglePasswordIconSlash');

        if (toggleBtn && passwordInput && iconEye && iconSlash) {
            toggleBtn.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    iconSlash.classList.add('hidden');
                    iconEye.classList.remove('hidden');
                } else {
                    passwordInput.type = 'password';
                    iconEye.classList.add('hidden');
                    iconSlash.classList.remove('hidden');
                }
            });
        }
    });
</script>
@endpush
@endsection
