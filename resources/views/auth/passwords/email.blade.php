@extends('auth.layouts.app')

@section('contents')
<div class="min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 bg-ns-navy-950">
    <div class="w-full max-w-md mx-auto">
        <div class="relative bg-ns-navy-900/70 backdrop-blur-xl border border-ns-gold-400/25 rounded-2xl p-7 sm:p-9 shadow-[0_20px_50px_rgba(0,0,0,0.6)]">
            <div class="absolute top-0 left-8 right-8 h-[2px] bg-gradient-to-r from-transparent via-ns-gold-400 to-transparent"></div>

            <h4 class="font-serif-heading text-xl sm:text-2xl text-white font-bold tracking-tight mb-2">
                {{ __('Reset Password') }}
            </h4>
            <p class="text-slate-300 text-sm mb-6">
                Masukkan alamat email Anda untuk menerima tautan pengaturan ulang kata sandi.
            </p>

            @if (session('status'))
                <div class="mb-5 p-3.5 rounded-xl bg-emerald-950/80 border border-emerald-500/40 text-emerald-300 text-xs leading-relaxed" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           autofocus
                           class="w-full px-4 py-3 bg-ns-navy-950/80 border @error('email') border-red-500/80 @else border-slate-700/80 focus:border-ns-gold-400 @enderror rounded-lg text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25" />
                    @error('email')
                        <span class="mt-1.5 text-xs text-red-400 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-5 rounded-lg bg-ns-gold-500 text-ns-navy-950 font-semibold text-xs uppercase tracking-wider hover:brightness-110 transition-all cursor-pointer">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
