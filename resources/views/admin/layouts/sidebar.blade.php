<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Brand / Logo Sidebar -->
    <div class="app-brand demo d-flex align-items-center justify-content-between px-4 py-3">
        <a href="{{ route('home') }}" class="app-brand-link d-flex align-items-center gap-3 text-decoration-none">
            <span class="app-brand-logo demo">
                <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Logo" class="rounded" style="width: 38px; height: 38px; object-fit: contain;">
            </span>
            <div class="app-brand-text demo d-flex flex-column">
                <span class="brand-title fw-bold text-white lh-1">NURUL SYAFII</span>
                <span class="brand-subtitle text-ns-gold-400 text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.12em;">Law Office</span>
            </div>
        </a>

        <!-- Menu Toggle Button for Desktop (collapse) & Mobile (close) -->
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="ti ti-x d-block d-xl-none ti-md align-middle text-muted"></i>
            <i class="ti ti-chevron-left d-none d-xl-block ti-sm align-middle text-muted"></i>
        </a>
    </div>

    <!-- Menu Items -->
    <ul class="menu-inner py-2">
        <!-- Main Section Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Navigasi Utama</span>
        </li>

        <!-- Dashboard -->
        <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Content Section Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Publikasi & Konten</span>
        </li>

        <!-- Artikel Hukum -->
        <li class="menu-item {{ Route::is('legal_opini.*') ? 'active' : '' }}">
            <a href="{{ route('legal_opini.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-text"></i>
                <div data-i18n="Artikel Hukum">Artikel Hukum</div>
            </a>
        </li>

        <!-- News / Berita -->
        <li class="menu-item {{ Route::is('news.*') ? 'active' : '' }}">
            <a href="{{ route('news.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-news"></i>
                <div data-i18n="News">Berita & Informasi</div>
            </a>
        </li>

        <!-- Jurnal Hukum -->
        <li class="menu-item {{ Route::is('jurnal.*') ? 'active' : '' }}">
            <a href="{{ route('jurnal.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="Jurnal">Jurnal Hukum</div>
            </a>
        </li>

        <!-- Media Section Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Firma & Galeri</span>
        </li>

        <!-- Legal Partnership -->
        <li class="menu-item {{ Route::is('legal_patnership.*') ? 'active' : '' }}">
            <a href="{{ route('legal_patnership.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Legal Patnership">Tim Advokat & Partner</div>
            </a>
        </li>

        <!-- Galery -->
        <li class="menu-item {{ Route::is('galery.*') ? 'active' : '' }}">
            <a href="{{ route('galery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-photo"></i>
                <div data-i18n="Galery">Galeri Foto</div>
            </a>
        </li>
    </ul>
</aside>
