<header class="sticky top-0 z-30 bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
    <!-- Left Side: Mobile Toggle & Badge -->
    <div class="flex items-center gap-3">
        <button type="button" onclick="toggleAdminSidebar()" aria-label="Buka Menu Navigasi"
            class="xl:hidden w-10 h-10 rounded-lg border border-slate-200 text-slate-700 hover:bg-slate-100 flex items-center justify-center transition">
            <i class="ti ti-menu-2 text-xl"></i>
        </button>

        <div class="hidden sm:flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-900 border border-amber-200 text-xs font-semibold">
                <i class="ti ti-shield-check text-amber-700 text-sm"></i>
                <span>Panel Kendali Advokat</span>
            </span>
        </div>
    </div>

    <!-- Right Side: Actions & User Dropdown -->
    <div class="flex items-center gap-3">
        <a href="{{ route('welcome') }}" target="_blank"
            class="hidden md:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg border border-amber-300 bg-amber-50/70 text-amber-900 hover:bg-amber-100 text-xs font-semibold transition">
            <i class="ti ti-external-link text-sm"></i>
            <span>Lihat Web</span>
        </a>

        <!-- User Profile Dropdown -->
        <div class="relative">
            <button type="button" onclick="toggleAdminDropdown(event, 'admin-user-dropdown')"
                class="flex items-center gap-2.5 p-1.5 rounded-xl hover:bg-slate-100 transition focus:outline-none">
                <div class="relative">
                    <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Admin Avatar"
                        class="w-9 h-9 rounded-full object-contain bg-ns-navy-900 p-0.5 border border-amber-400">
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white"></span>
                </div>
                <div class="hidden lg:flex flex-col text-left">
                    <span class="text-slate-900 font-bold text-xs leading-tight">Admin Lawyer</span>
                    <span class="text-amber-700 font-medium text-[11px]">Administrator</span>
                </div>
                <i class="ti ti-chevron-down text-xs text-slate-500 hidden lg:block"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="admin-user-dropdown"
                class="admin-dropdown-menu hidden absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                <div class="px-4 py-2.5 border-b border-slate-100 flex items-center gap-3">
                    <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Admin"
                        class="w-10 h-10 rounded-full object-contain bg-ns-navy-900 p-1 border border-amber-400">
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-bold text-slate-900 truncate">Admin Lawyer</p>
                        <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email ?? 'admin.lawyer@gmail.com' }}</p>
                    </div>
                </div>

                <div class="py-1">
                    <a href="{{ route('welcome') }}" target="_blank"
                        class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50 hover:text-amber-800 transition">
                        <i class="ti ti-world text-base text-amber-700"></i>
                        <span>Kunjungi Website Utama</span>
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-1.5 px-2">
                    <button type="button"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition shadow-sm">
                        <i class="ti ti-logout text-sm"></i>
                        <span>Keluar / Logout</span>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
