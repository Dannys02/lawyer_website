@extends('admin.layouts.app')

@section('contents')
    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h1 class="text-lg font-bold text-slate-900">Tambah Data Media Sosial</h1>
                    <p class="text-xs text-slate-600">Tambahkan informasi tautan media sosial, peta, dan alamat kantor hukum</p>
                </div>
                <a href="{{ route('socialmedia.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition self-start sm:self-auto">
                    <i class="ti ti-arrow-left text-sm"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Body -->
            <form method="POST" action="{{ route('socialmedia.store') }}"
                onsubmit="document.getElementById('loading-screen').style.display = 'flex';" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Facebook -->
                    <div>
                        <label for="facebook" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Facebook <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="facebook" name="facebook" value="{{ old('facebook') }}" required
                            placeholder="Contoh: https://www.facebook.com/..."
                            class="w-full px-4 py-2.5 rounded-xl border @error('facebook') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('facebook')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instagram -->
                    <div>
                        <label for="instagram" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Instagram <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="instagram" name="instagram" value="{{ old('instagram') }}" required
                            placeholder="Contoh: https://www.instagram.com/..."
                            class="w-full px-4 py-2.5 rounded-xl border @error('instagram') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('instagram')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- WhatsApp (wa) -->
                    <div>
                        <label for="wa" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            WhatsApp (wa) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="wa" name="wa" value="{{ old('wa') }}" required
                            placeholder="Contoh: https://wa.me/..."
                            class="w-full px-4 py-2.5 rounded-xl border @error('wa') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('wa')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- TikTok -->
                    <div>
                        <label for="tiktok" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            TikTok <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="tiktok" name="tiktok" value="{{ old('tiktok') }}" required
                            placeholder="Contoh: https://www.tiktok.com/@..."
                            class="w-full px-4 py-2.5 rounded-xl border @error('tiktok') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                        @error('tiktok')
                            <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Maps -->
                <div>
                    <label for="maps" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Tautan Google Maps (maps) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="maps" name="maps" value="{{ old('maps') }}" required
                        placeholder="Contoh: https://www.google.com/maps?q=..."
                        class="w-full px-4 py-2.5 rounded-xl border @error('maps') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('maps')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Alamat Kantor (address) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" required
                        placeholder="Masukkan alamat lengkap kantor hukum..."
                        class="w-full px-4 py-2.5 rounded-xl border @error('address') border-red-500 @else border-slate-300 @enderror text-slate-900 text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/20" />
                    @error('address')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
                    <a href="{{ route('socialmedia.index') }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold uppercase tracking-wider transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ns-gold-500 to-amber-600 text-white text-xs font-bold uppercase tracking-wider shadow-md hover:brightness-110 transition cursor-pointer">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
