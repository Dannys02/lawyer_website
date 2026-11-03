<!doctype html>

<html lang="id" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets_admin/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard Admin Lawyer &mdash; Kantor Hukum Nurul Syafii</title>

    <meta name="description" content="Dashboard Panel Kendali Administrator Kantor Hukum Nurul Syafii" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <!-- Fonts: Poppins Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS Vuexy -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/css/rtl/theme-raspberry.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_admin/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/libs/quill/editor.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/css/pages/cards-advance.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets_admin/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets_admin/js/config.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Navy & Gold Luxury Admin Stylesheet (Light Background Content, Dark Elegant Sidebar) -->
    <style>
        :root {
            --ns-navy-darkest: #070F1E;
            --ns-navy-dark: #0B162C;
            --ns-navy-card: #0F1E3A;
            --ns-navy-hover: #162B50;
            --ns-gold-main: #D4AF37;
            --ns-gold-subtle: #C99A2C;
            --ns-border-gold: rgba(212, 175, 55, 0.28);
            --ns-bg-main: #FFFFFF;
            --ns-bg-card: #FFFFFF;
            --ns-text-dark: #1E293B;
            --ns-text-muted: #64748B;
            --ns-border-light: #E2E8F0;
        }

        /* Sembunyikan scrollbar di seluruh elemen admin (fungsi scroll tetap bekerja) */
        html, body, * {
            -ms-overflow-style: none !important; /* IE dan Edge */
            scrollbar-width: none !important; /* Firefox */
        }

        *::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            background: transparent !important;
        }

        /* Hilangkan visual scrollbar bawaan PerfectScrollbar jika ada */
        .ps__rail-x,
        .ps__rail-y {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* Latar Belakang Seluruh Halaman Admin: Putih Bersih & Font Poppins */
        html, body,
        .layout-wrapper,
        .layout-container,
        .layout-page,
        .content-wrapper,
        .card,
        .table,
        .btn,
        .form-control,
        .form-select,
        .modal,
        .dropdown-menu,
        h1, h2, h3, h4, h5, h6,
        p, span, a, label, input, button {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        }

        html, body {
            background-color: var(--ns-bg-main) !important;
            color: var(--ns-text-dark) !important;
        }

        .layout-wrapper,
        .layout-container,
        .layout-page,
        .content-wrapper {
            background-color: var(--ns-bg-main) !important;
        }

        .font-serif-heading {
            font-family: 'Poppins', sans-serif !important;
        }

        /* ========================================================
           SIDEBAR STYLING (Tetap Dipertahankan Navy Gelap & Mewah)
           ======================================================== */
        .layout-menu.bg-menu-theme {
            background-color: var(--ns-navy-dark) !important;
            border-right: 1px solid var(--ns-border-gold) !important;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.25) !important;
        }

        .bg-menu-theme .app-brand {
            border-bottom: 1px solid var(--ns-border-gold);
            background-color: var(--ns-navy-darkest);
        }

        .bg-menu-theme .menu-header {
            color: #94A3B8 !important;
            font-size: 0.7rem;
            letter-spacing: 0.12em;
            padding-left: 1.5rem;
            margin-top: 1.25rem;
        }

        .bg-menu-theme .menu-link {
            color: #CBD5E1 !important;
            border-radius: 10px;
            margin: 4px 12px;
            padding: 10px 16px;
            position: relative;
            font-weight: 500;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
            will-change: transform, background-color, color, box-shadow;
        }

        .bg-menu-theme .menu-link:hover {
            background-color: var(--ns-navy-hover) !important;
            color: var(--ns-gold-main) !important;
            transform: translateX(6px) !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25) !important;
        }

        .bg-menu-theme .menu-link .menu-icon {
            color: #94A3B8;
            font-size: 1.25rem;
            margin-right: 12px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .bg-menu-theme .menu-link:hover .menu-icon {
            color: var(--ns-gold-main) !important;
            transform: scale(1.15) !important;
        }

        .bg-menu-theme .menu-link div {
            transition: color 0.35s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .bg-menu-theme .menu-item.active > .menu-link {
            background: linear-gradient(90deg, #E2B842 0%, #C99A2C 100%) !important;
            color: var(--ns-navy-darkest) !important;
            font-weight: 600;
            box-shadow: 0 4px 18px rgba(226, 184, 66, 0.35) !important;
            transform: none !important;
        }

        .bg-menu-theme .menu-item.active > .menu-link:hover {
            transform: translateX(4px) !important;
            box-shadow: 0 6px 22px rgba(226, 184, 66, 0.45) !important;
        }

        .bg-menu-theme .menu-item.active > .menu-link .menu-icon,
        .bg-menu-theme .menu-item.active > .menu-link div {
            color: var(--ns-navy-darkest) !important;
            font-weight: 700;
        }

        /* ========================================================
           NAVBAR ATAS (Putih Bersih dengan Border Lembut & Aksen Gold)
           ======================================================== */
        .layout-navbar.navbar-detached {
            background-color: #FFFFFF !important;
            border: 1px solid #E2E8F0 !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
        }

        .layout-navbar .nav-link,
        .layout-navbar .navbar-nav-right {
            color: var(--ns-text-dark) !important;
        }

        /* ========================================================
           CARD MODERN STYLING (Card Putih Bersih)
           ======================================================== */
        .card {
            background-color: #FFFFFF !important;
            border: 1px solid #E2E8F0 !important;
            border-radius: 14px !important;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05) !important;
            color: var(--ns-text-dark) !important;
        }

        .card-header {
            background-color: transparent !important;
            border-bottom: 1px solid #F1F5F9 !important;
            color: #0F172A !important;
            font-weight: 600;
        }

        .card-title {
            color: #0F172A !important;
        }

        /* ========================================================
           TABEL STYLING (Terang & Mudah Dibaca)
           ======================================================== */
        .table {
            color: #1E293B !important;
            border-color: #F1F5F9 !important;
        }

        .table th {
            color: #475569 !important;
            background-color: #F8FAFC !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.72rem;
            letter-spacing: 0.08em;
            border-bottom: 1px solid #E2E8F0 !important;
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .table td {
            color: #334155 !important;
            border-bottom: 1px solid #F1F5F9 !important;
            vertical-align: middle;
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .table tr:hover td {
            background-color: #F8FAFC !important;
        }

        /* ========================================================
           DROPDOWN & MODAL THEME (Putih Elegan)
           ======================================================== */
        .dropdown-menu {
            background-color: #FFFFFF !important;
            border: 1px solid #E2E8F0 !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .dropdown-item {
            color: #334155 !important;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #F8FAFC !important;
            color: var(--ns-navy-dark) !important;
        }

        .dropdown-divider {
            border-color: #F1F5F9 !important;
        }

        .modal-content {
            background-color: #FFFFFF !important;
            border: 1px solid #E2E8F0 !important;
            color: #1E293B !important;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important;
        }

        .modal-header, .modal-footer {
            border-color: #F1F5F9 !important;
        }

        .modal-title {
            color: #0F172A !important;
        }

        .form-control, .form-select {
            background-color: #FFFFFF !important;
            border: 1px solid #CBD5E1 !important;
            color: #0F172A !important;
            border-radius: 8px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #FFFFFF !important;
            border-color: var(--ns-gold-main) !important;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.2) !important;
            color: #0F172A !important;
        }

        .form-label {
            color: #334155 !important;
            font-weight: 500;
        }

        /* ========================================================
           BUTTONS GOLD & PRIMARY
           ======================================================== */
        .btn-primary {
            background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%) !important;
            border-color: #D4AF37 !important;
            color: #FFFFFF !important;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(212, 175, 55, 0.3) !important;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #E2B842 0%, #C99A2C 100%) !important;
            color: #FFFFFF !important;
            transform: translateY(-1px);
        }

        /* Footer Putih Bersih */
        .bg-footer-theme {
            background-color: #FFFFFF !important;
            color: #64748B !important;
            border-top: 1px solid #E2E8F0 !important;
        }

        /* Utility classes */
        .text-ns-gold-400 {
            color: #B8860B !important;
        }

        .bg-ns-gold-400-20 {
            background-color: rgba(212, 175, 55, 0.15) !important;
        }

        .bg-ns-gold-400-10 {
            background-color: rgba(212, 175, 55, 0.08) !important;
        }

        .border-ns-gold-400-15 {
            border-color: rgba(212, 175, 55, 0.2) !important;
        }

        .border-ns-gold-400-20 {
            border-color: #E2E8F0 !important;
        }

        .border-ns-gold-400-30 {
            border-color: rgba(212, 175, 55, 0.35) !important;
        }

        .border-ns-gold-400-40 {
            border-color: rgba(212, 175, 55, 0.45) !important;
        }

        .bg-ns-navy-900 {
            background-color: var(--ns-navy-dark) !important;
        }

        .bg-ns-navy-950 {
            background-color: var(--ns-navy-darkest) !important;
        }

        /* SweetAlert Light Harmony */
        .swal2-popup {
            background-color: #FFFFFF !important;
            color: #1E293B !important;
            border: 1px solid #E2E8F0 !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
        }
        .swal2-title, .swal2-html-container {
            color: #0F172A !important;
        }

        /* Checked Star Gold */
        .fa-star.checked {
            color: #D4AF37 !important;
        }
    </style>
</head>

<body>
    <x-loader />
    <!-- Layout wrapper (Vertical Layout with Left Sidebar) -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar Kiri -->
            @include('admin.layouts.sidebar')
            <!-- / Sidebar Kiri -->

            <!-- Layout Page -->
            <div class="layout-page">
                <!-- Top Navbar -->
                @include('admin.layouts.navbar')
                <!-- / Top Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Main Content -->
                    @yield('contents')
                    <!--/ Main Content -->

                    <!-- Footer -->
                    @include('admin.layouts.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!--/ Layout Page -->
        </div>

        <!-- Overlay for Mobile Sidebar -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('assets_admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets_admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/libs/quill/quill.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets_admin/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets_admin/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets_admin/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('assets_admin/js/forms-editors.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>

</html>
