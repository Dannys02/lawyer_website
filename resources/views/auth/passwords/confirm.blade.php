@extends('auth.layouts.app')

@section('contents')
<div class="min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 bg-ns-navy-950">
    <div class="w-full max-w-md mx-auto">
        <div class="relative bg-ns-navy-900/70 backdrop-blur-xl border border-ns-gold-400/25 rounded-2xl p-7 sm:p-9 shadow-[0_20px_50px_rgba(0,0,0,0.6)]">
            <div class="absolute top-0 left-8 right-8 h-[2px] bg-gradient-to-r from-transparent via-ns-gold-400 to-transparent"></div>

            <h4 class="font-serif-heading text-xl sm:text-2xl text-white font-bold tracking-tight mb-2">
                {{ __('Confirm Password') }}
            </h4>
            <p class="text-slate-300 text-sm mb-6">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        {{ __('Password') }}
                    </label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           class="w-full px-4 py-3 bg-ns-navy-950/80 border @error('password') border-red-500/80 @else border-slate-700/80 focus:border-ns-gold-400 @enderror rounded-lg text-slate-100 text-sm focus:outline-none focus:ring-2 focus:ring-ns-gold-400/25" />
                    @error('password')
                        <span class="mt-1.5 text-xs text-red-400 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col gap-3 pt-2">
                    <button type="submit" class="w-full py-3 px-5 rounded-lg bg-ns-gold-500 text-ns-navy-950 font-semibold text-xs uppercase tracking-wider hover:brightness-110 transition-all cursor-pointer">
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-center text-xs text-ns-gold-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
