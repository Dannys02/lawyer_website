@extends('admin.layouts.app')

@php
    $inputClass = 'w-full px-4 py-2.5 rounded-xl border text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20';
    $labelClass = 'block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5';
@endphp

@section('contents')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Ringkasan Akun -->
        <div class="px-6 py-5 bg-slate-50 border-b border-slate-200 flex items-center gap-4">
            <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Avatar"
                class="w-14 h-14 rounded-full object-contain bg-ns-navy-900 p-1 border border-amber-400">
            <div class="min-w-0">
                <h1 class="text-lg font-bold text-slate-900 truncate">Profil Akun</h1>
                <p class="text-sm text-slate-600 truncate">{{ $user->name }} &middot; {{ $user->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Email -->
            <div>
                <label for="email" class="{{ $labelClass }}">Email Login <span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" required autocomplete="email"
                    value="{{ old('email', $user->email) }}"
                    class="{{ $inputClass }} @error('email') border-red-500 @else border-slate-300 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Saat Ini (wajib untuk menyimpan perubahan apa pun) -->
            <div class="pt-5 border-t border-slate-200">
                <h2 class="text-sm font-bold text-slate-900 mb-3">Password</h2>
                <label for="current_password" class="{{ $labelClass }}">Password Saat Ini <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password" required
                        autocomplete="current-password"
                        class="{{ $inputClass }} pr-11 @error('current_password') border-red-500 @else border-slate-300 @enderror">
                    <button type="button" onclick="togglePasswordField(this)" aria-label="Tampilkan password"
                        class="absolute inset-y-0 right-0 px-3 text-slate-500 hover:text-amber-700">
                        <i class="ti ti-eye text-lg"></i>
                    </button>
                </div>
                @error('current_password')
                    <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                @else
                    <p class="mt-1 text-[11px] text-slate-500">Wajib diisi setiap kali menyimpan perubahan, termasuk jika hanya mengganti email.</p>
                @enderror
            </div>


            <!-- Password Baru (opsional) -->
            <div class="space-y-4">
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Password Baru <span class="normal-case font-medium text-slate-400">(opsional)</span></h3>
                    <p class="text-xs text-slate-500">Kosongkan jika tidak ingin mengganti password.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ([['password', 'Password Baru'], ['password_confirmation', 'Ulangi Password Baru']] as [$field, $label])
                        <div>
                            <label for="{{ $field }}" class="{{ $labelClass }}">{{ $label }}</label>
                            <div class="relative">
                                <input type="password" id="{{ $field }}" name="{{ $field }}" autocomplete="new-password"
                                    @if ($field === 'password') oninput="updatePasswordHint(this.value)" @endif
                                    class="{{ $inputClass }} pr-11 @error($field) border-red-500 @else border-slate-300 @enderror">
                                <button type="button" onclick="togglePasswordField(this)" aria-label="Tampilkan password"
                                    class="absolute inset-y-0 right-0 px-3 text-slate-500 hover:text-amber-700">
                                    <i class="ti ti-eye text-lg"></i>
                                </button>
                            </div>
                            @error($field)
                                <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <p id="pw-length-hint" class="text-[11px] text-slate-500">Minimal 8 karakter.</p>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-ns-navy-900 hover:bg-ns-navy-800 text-white text-xs font-bold uppercase tracking-wider transition shadow-sm">
                    <i class="ti ti-device-floppy text-sm"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordField(btn) {
            const input = btn.parentElement.querySelector('input');
            const icon = btn.querySelector('i');
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.className = (show ? 'ti ti-eye-off' : 'ti ti-eye') + ' text-lg';
            btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        }

        function updatePasswordHint(value) {
            const hint = document.getElementById('pw-length-hint');
            const ok = value.length >= 8;
            hint.textContent = value && !ok ? `Minimal 8 karakter (${value.length}/8)` : 'Minimal 8 karakter.';
            hint.className = 'text-[11px] ' + (value && !ok ? 'text-red-600' : (ok ? 'text-emerald-600' : 'text-slate-500'));
        }
    </script>
@endsection
