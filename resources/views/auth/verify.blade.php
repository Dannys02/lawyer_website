@extends('auth.layouts.app')

@section('contents')
<div class="min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 bg-ns-navy-950">
    <div class="w-full max-w-md mx-auto">
        <div class="relative bg-ns-navy-900/70 backdrop-blur-xl border border-ns-gold-400/25 rounded-2xl p-7 sm:p-9 shadow-[0_20px_50px_rgba(0,0,0,0.6)]">
            <div class="absolute top-0 left-8 right-8 h-[2px] bg-gradient-to-r from-transparent via-ns-gold-400 to-transparent"></div>

            <h4 class="font-serif-heading text-xl sm:text-2xl text-white font-bold tracking-tight mb-3">
                {{ __('Verify Your Email Address') }}
            </h4>

            @if (session('resent'))
                <div class="mb-4 p-3.5 rounded-xl bg-emerald-950/80 border border-emerald-500/40 text-emerald-300 text-xs leading-relaxed" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="text-slate-300 text-sm leading-relaxed mb-5">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
            </p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="w-full py-3 px-5 rounded-lg bg-ns-gold-500 text-ns-navy-950 font-semibold text-xs uppercase tracking-wider hover:brightness-110 transition-all cursor-pointer">
                    {{ __('click here to request another') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
