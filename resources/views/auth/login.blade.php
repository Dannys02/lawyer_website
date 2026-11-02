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
                    <i class="fa-solid fa-scale-balanced text-ns-gold-400"></i>
                    <span>Portal Akses Terpadu</span>
                </div>
                <h1 class="font-serif-heading text-3xl xl:text-4xl text-white font-bold tracking-tight leading-snug">
                    Integritas, Keadilan &amp; Profesionalisme
                </h1>
                <p class="text-slate-300 text-sm xl:text-base leading-relaxed font-light">
                    Sistem administrasi internal kantor hukum untuk pengelolaan manajemen perkara, informasi publik, layanan konsultasi hukum, dan publikasi edukasi yuridis terpercaya.
                </p>
            </div>

            {{-- Quote / Badge Elegan --}}
            <div class="pt-6 border-t border-slate-700/60 flex items-center gap-4 text-xs text-slate-400">
                <div class="w-10 h-10 rounded-lg bg-ns-navy-900/90 border border-ns-gold-400/30 flex items-center justify-center text-ns-gold-400 shrink-0">
                    <i class="fa-solid fa-shield-halved text-lg"></i>
                </div>
                <p class="leading-relaxed">
                    Sistem diamankan dengan enkripsi standar industri. Akses terbatas khusus personel dan pengelola resmi.
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
                        <i class="fa-solid fa-user-shield"></i>
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
                                <i class="fa-regular fa-envelope text-sm"></i>
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
                                <i class="fa-solid fa-circle-exclamation"></i>
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
                                <i class="fa-solid fa-lock text-sm"></i>
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
                                <i id="togglePasswordIcon" class="fa-solid fa-eye-slash text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="mt-2 text-xs text-red-400 flex items-center gap-1.5" role="alert">
                                <i class="fa-solid fa-circle-exclamation"></i>
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
                            <i class="fa-solid fa-arrow-right-to-bracket text-xs transition-transform duration-200 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </form>

                {{-- Tautan Balik ke Beranda --}}
                <div class="mt-6 pt-5 border-t border-slate-800 text-center">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center gap-2 text-xs text-slate-400 hover:text-ns-gold-400 transition-colors duration-200">
                        <i class="fa-solid fa-arrow-left text-[11px]"></i>
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
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (toggleBtn && passwordInput && toggleIcon) {
            toggleBtn.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                }
            });
        }
    });
</script>
@endpush
@endsection
