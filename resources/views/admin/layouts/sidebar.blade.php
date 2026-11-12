<aside id="admin-sidebar"
    class="fixed top-0 left-0 bottom-0 z-50 w-72 bg-ns-navy-900 border-r border-ns-gold-500/25 flex flex-col transform -translate-x-full xl:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl">

    <!-- Brand / Logo Sidebar -->
    <div class="h-20 px-6 bg-ns-navy-950 border-b border-ns-gold-500/25 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
            <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Logo"
                class="w-10 h-10 object-contain rounded-lg bg-ns-navy-900 p-1 border border-ns-gold-400/40 group-hover:scale-105 transition-transform">
            <div class="flex flex-col">
                <span class="font-bold text-white text-base tracking-wide leading-tight">NURUL SYAFII</span>
                <span class="text-ns-gold-400 uppercase font-semibold text-[10px] tracking-[0.14em]">Law Office</span>
            </div>
        </a>

        <!-- Mobile Close Button -->
        <button type="button" onclick="toggleAdminSidebar()" aria-label="Tutup Menu Sidebar"
            class="xl:hidden w-8 h-8 rounded-lg border border-white/15 text-slate-300 hover:text-white hover:border-ns-gold-400 flex items-center justify-center transition">
            <i class="ti ti-x text-lg"></i>
        </button>
    </div>

    <!-- Menu Items -->
    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-6" aria-label="Menu Admin">
        <!-- Main Section -->
        <div>
            <span class="px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-2.5">
                Navigasi Utama
            </span>
            <ul class="space-y-1.5">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('home') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-smart-home text-lg {{ Route::is('home') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content Section -->
        <div>
            <span class="px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-2.5">
                Publikasi &amp; Konten
            </span>
            <ul class="space-y-1.5">
                <li>
                    <a href="{{ route('legal_opini.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('legal_opini.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-file-text text-lg {{ Route::is('legal_opini.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Artikel Hukum</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('news.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-news text-lg {{ Route::is('news.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Berita &amp; Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('peraturan.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('peraturan.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-scale text-lg {{ Route::is('peraturan.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Kumpulan Peraturan</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Media Section -->
        <div>
            <span class="px-3 text-[11px] font-bold uppercase tracking-widest text-slate-400 block mb-2.5">
                Firma &amp; Galeri
            </span>
            <ul class="space-y-1.5">
                <li>
                    <a href="{{ route('legal_patnership.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('legal_patnership.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-briefcase text-lg {{ Route::is('legal_patnership.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Tim Advokat &amp; Partner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('galery.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('galery.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-photo text-lg {{ Route::is('galery.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Galeri Foto</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('abouts.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('abouts.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-info-circle text-lg {{ Route::is('abouts.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('socialmedia.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 {{ Route::is('socialmedia.*') ? 'bg-gradient-to-r from-ns-gold-400 to-ns-gold-500 text-ns-navy-950 font-bold shadow-lg shadow-ns-gold-500/25' : 'text-slate-300 hover:bg-white/5 hover:text-ns-gold-400 hover:translate-x-1' }}">
                        <i class="ti ti-share text-lg {{ Route::is('socialmedia.*') ? 'text-ns-navy-950' : 'text-ns-gold-400' }}"></i>
                        <span>Media Sosial</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
