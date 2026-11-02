<nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Navigasi Utama">
    <div class="flex items-center justify-between min-h-[76px]">
        <!-- Brand Logo -->
        <a class="flex items-center py-2 flex-shrink-0" href="{{ route('welcome') }}"
            aria-label="Beranda Kantor Hukum Nurul Safii & Partners">
            <img src="{{ asset('interface/img/LOGO_NS.png') }}" alt="Logo Kantor Hukum Nurul Safii & Partners"
                class="h-10 sm:h-11 w-auto object-contain">
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobile-menu-btn" type="button"
            class="lg:hidden inline-flex items-center gap-2 min-h-[44px] min-w-[44px] px-3.5 py-2 border border-ns-gold-400 rounded bg-ns-navy-800 text-ns-light-100 hover:bg-ns-navy-700 focus:outline-none focus:ring-2 focus:ring-ns-gold-400"
            aria-controls="mobile-menu" aria-expanded="false" aria-label="Buka menu navigasi"
            onclick="toggleMobileMenu()">
            <span class="flex flex-col gap-1 w-5" aria-hidden="true">
                <span class="block h-0.5 bg-ns-gold-400 w-full transition-transform duration-200" id="bar1"></span>
                <span class="block h-0.5 bg-ns-gold-400 w-full transition-opacity duration-200" id="bar2"></span>
                <span class="block h-0.5 bg-ns-gold-400 w-full transition-transform duration-200" id="bar3"></span>
            </span>
            <span class="text-xs font-bold uppercase tracking-wider text-ns-light-100">Menu</span>
        </button>

        <!-- Desktop Navigation Links -->
        <div class="hidden lg:flex lg:items-center lg:gap-5 xl:gap-6">
            <ul class="flex items-center gap-4 xl:gap-6 list-none m-0 p-0">
                <li>
                    <a class="relative inline-flex items-center px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('welcome') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        href="{{ route('welcome') }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="relative inline-flex items-center px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('about') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        href="{{ route('about') }}">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a class="relative inline-flex items-center px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('service') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        href="{{ route('service') }}">
                        Layanan Hukum
                    </a>
                </li>
                <li>
                    <a class="relative inline-flex items-center px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('partner') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        href="{{ route('partner') }}">
                        Legal Partnership
                    </a>
                </li>
                <li>
                    <a class="relative inline-flex items-center px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('picture') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        href="{{ route('picture') }}">
                        Galeri
                    </a>
                </li>

                <!-- Dropdown Desktop -->
                <li class="relative group" id="desktop-dropdown">
                    <button type="button"
                        class="inline-flex items-center gap-1.5 px-1 py-3 text-xs xl:text-[13px] font-semibold tracking-wider uppercase text-ns-light-100 hover:text-ns-gold-400 transition-colors {{ Route::is('article') || Route::is('file') || Route::is('break-news') ? 'text-ns-gold-400 after:absolute after:bottom-1 after:left-1 after:right-1 after:h-0.5 after:bg-ns-gold-400' : '' }}"
                        aria-expanded="false" aria-haspopup="true">
                        Karya Ilmiah
                        <i class="fas fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"
                            aria-hidden="true"></i>
                    </button>
                    <!-- Dropdown Content -->
                    <div
                        class="absolute left-0 top-full pt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 shadow-2xl z-50">
                        <ul
                            class="bg-ns-navy-800 border border-ns-gold-500/30 border-t-2 border-t-ns-gold-400 rounded-md py-1 shadow-xl">
                            <li>
                                <a class="block px-4 py-2.5 text-xs uppercase font-medium text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition-colors border-b border-white/5 {{ Route::is('article') ? 'bg-ns-gold-400 text-ns-navy-900 font-bold' : '' }}"
                                    href="{{ route('article') }}">
                                    Artikel Hukum
                                </a>
                            </li>
                            <li>
                                <a class="block px-4 py-2.5 text-xs uppercase font-medium text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition-colors border-b border-white/5 {{ Route::is('file') ? 'bg-ns-gold-400 text-ns-navy-900 font-bold' : '' }}"
                                    href="{{ route('file') }}">
                                    Jurnal Hukum
                                </a>
                            </li>
                            <li>
                                <a class="block px-4 py-2.5 text-xs uppercase font-medium text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition-colors {{ Route::is('break-news') ? 'bg-ns-gold-400 text-ns-navy-900 font-bold' : '' }}"
                                    href="{{ route('break-news') }}">
                                    Berita
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- CTA Button -->
            <a class="inline-flex items-center justify-center min-h-[44px] px-5 py-2 bg-ns-gold-400 text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded border border-ns-gold-400 hover:bg-white hover:border-white transition-all duration-150 shadow-sm"
                href="{{ route('contact') }}">
                Konsultasi &amp; Kontak
            </a>
        </div>
    </div>

    <!-- Mobile Navigation Drawer (Top Dropdown / Hamburger Menu) -->
    <div id="mobile-menu" class="hidden lg:hidden pb-4 pt-2">
        <ul class="flex flex-col bg-ns-navy-800 border border-ns-gold-500/30 rounded-lg p-3 space-y-1">
            <li>
                <a class="block px-3 py-2.5 text-sm font-semibold tracking-wider uppercase text-ns-light-100 rounded hover:text-ns-gold-400 {{ Route::is('welcome') ? 'text-ns-gold-400 font-bold' : '' }}"
                    href="{{ route('welcome') }}">Beranda</a>
            </li>
            <li>
                <a class="block px-3 py-2.5 text-sm font-semibold tracking-wider uppercase text-ns-light-100 rounded hover:text-ns-gold-400 {{ Route::is('about') ? 'text-ns-gold-400 font-bold' : '' }}"
                    href="{{ route('about') }}">Tentang Kami</a>
            </li>
            <li>
                <a class="block px-3 py-2.5 text-sm font-semibold tracking-wider uppercase text-ns-light-100 rounded hover:text-ns-gold-400 {{ Route::is('service') ? 'text-ns-gold-400 font-bold' : '' }}"
                    href="{{ route('service') }}">Layanan Hukum</a>
            </li>
            <li>
                <a class="block px-3 py-2.5 text-sm font-semibold tracking-wider uppercase text-ns-light-100 rounded hover:text-ns-gold-400 {{ Route::is('partner') ? 'text-ns-gold-400 font-bold' : '' }}"
                    href="{{ route('partner') }}">Legal Partnership</a>
            </li>
            <li>
                <a class="block px-3 py-2.5 text-sm font-semibold tracking-wider uppercase text-ns-light-100 rounded hover:text-ns-gold-400 {{ Route::is('picture') ? 'text-ns-gold-400 font-bold' : '' }}"
                    href="{{ route('picture') }}">Galeri</a>
            </li>
            <li class="border-t border-white/10 pt-1">
                <span class="block px-3 py-1.5 text-xs font-bold text-ns-gold-400 uppercase tracking-wider">Karya
                    Ilmiah</span>
                <div class="pl-3 space-y-1">
                    <a class="block px-3 py-1.5 text-xs uppercase text-ns-light-300 hover:text-ns-gold-400 {{ Route::is('article') ? 'text-ns-gold-400 font-bold' : '' }}"
                        href="{{ route('article') }}">Artikel Hukum</a>
                    <a class="block px-3 py-1.5 text-xs uppercase text-ns-light-300 hover:text-ns-gold-400 {{ Route::is('file') ? 'text-ns-gold-400 font-bold' : '' }}"
                        href="{{ route('file') }}">Jurnal Hukum</a>
                    <a class="block px-3 py-1.5 text-xs uppercase text-ns-light-300 hover:text-ns-gold-400 {{ Route::is('break-news') ? 'text-ns-gold-400 font-bold' : '' }}"
                        href="{{ route('break-news') }}">Berita</a>
                </div>
            </li>
            <li class="pt-2">
                <a class="flex items-center justify-center w-full min-h-[44px] px-4 py-2.5 bg-ns-gold-400 text-ns-navy-900 font-bold text-xs uppercase tracking-wider rounded text-center"
                    href="{{ route('contact') }}">
                    Konsultasi &amp; Kontak
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        var menu = document.getElementById('mobile-menu');
        var btn = document.getElementById('mobile-menu-btn');
        if (!menu || !btn) return;
        var isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            btn.setAttribute('aria-expanded', 'true');
        } else {
            menu.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
        }
    }
</script>
