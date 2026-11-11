@extends('auth.layouts.app')

@section('contents')
    <div class="min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 relative overflow-hidden bg-ns-navy-950">
        {{-- Card Wrapper --}}
        <div class="w-full max-w-md mx-auto relative z-10">
            {{-- Logo Header --}}
            <div class="mb-8 text-center">
                <a href="{{ route('welcome') }}" class="inline-block transition-transform duration-300 hover:scale-105"
                    title="Kembali ke Beranda">
                    <img src="{{ asset('interface/img/LOGO_NS.png') }}" alt="Kantor Hukum Nurul Safii"
                        class="h-14 w-auto mx-auto filter drop-shadow-[0_2px_12px_rgba(212,175,55,0.25)]" />
                </a>
            </div>

            <div
                class="relative bg-ns-navy-900/70 backdrop-blur-xl border border-ns-gold-400/25 rounded-2xl p-7 sm:p-9 shadow-[0_20px_50px_rgba(0,0,0,0.6)]">
                <div
                    class="absolute top-0 left-8 right-8 h-[2px] bg-gradient-to-r from-transparent via-ns-gold-400 to-transparent">
                </div>

                <div class="mb-6 text-center sm:text-left">
                    <h4 class="font-serif-heading text-2xl text-white font-bold tracking-tight mb-1">
                        Registrasi Akun
                    </h4>
                    <p class="text-slate-300 text-sm">
                        Buat akun administrator baru untuk mengelola sistem
                    </p>
                </div>

                <form id="formAuthentication" class="space-y-5" action="{{ route('register') }}" method="POST"
                    onsubmit="document.getElementById('loading-screen').style.display = 'flex';">
                    @csrf

                    {{-- Nama --}}
                    <div>
                        <label for="name"
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Username / Nama
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap" autocomplete="name" autofocus required
                            class="w-full px-4 py-3 bg-ns-navy-950/80 border @error('name') border-red-500/80 focus:border-red-500 @else border-slate-700/80 focus:border-ns-gold-400 @enderror rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25 transition-all" />
                        @error('name')
                            <span class="mt-1.5 text-xs text-red-400 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email"
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan alamat email" autocomplete="email" required
                            class="w-full px-4 py-3 bg-ns-navy-950/80 border @error('email') border-red-500/80 focus:border-red-500 @else border-slate-700/80 focus:border-ns-gold-400 @enderror rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25 transition-all" />
                        @error('email')
                            <span class="mt-1.5 text-xs text-red-400 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password"
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required
                            class="w-full px-4 py-3 bg-ns-navy-950/80 border @error('password') border-red-500/80 focus:border-red-500 @else border-slate-700/80 focus:border-ns-gold-400 @enderror rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25 transition-all" />
                        @error('password')
                            <span class="mt-1.5 text-xs text-red-400 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label for="password_confirmation"
                            class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                            Konfirmasi Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required
                            class="w-full px-4 py-3 bg-ns-navy-950/80 border border-slate-700/80 focus:border-ns-gold-400 rounded-lg text-slate-100 text-sm placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25 transition-all" />
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-3.5 px-6 rounded-lg bg-ns-gold-500 text-ns-navy-950 font-semibold text-sm uppercase tracking-wider hover:brightness-110 transition-all shadow-[0_4px_20px_rgba(212,175,55,0.3)] cursor-pointer">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <p class="mt-6 pt-5 border-t border-slate-800 text-center text-xs text-slate-400">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}" class="text-ns-gold-400 hover:underline font-semibold ml-1">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
