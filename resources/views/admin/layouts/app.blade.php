<!doctype html>
<html lang="id" class="h-full">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Dashboard Admin Lawyer &mdash; Kantor Hukum Nurul Safii</title>
    <meta name="description" content="Dashboard Panel Kendali Administrator Kantor Hukum Nurul Safii" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <!-- Fonts: Poppins Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet" />

    <!-- Icons (FontAwesome & Tabler Icons Only, ZERO Bootstrap) -->
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/vendor/fonts/tabler-icons.css') }}" />

    <!-- Toastr Notification CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Vite Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body
    class="min-h-screen bg-slate-50 text-slate-800 font-sans antialiased selection:bg-ns-gold-400 selection:text-ns-navy-950">
    <x-loader />

    <div class="flex min-h-screen relative">
        <!-- Mobile Sidebar Backdrop -->
        <div id="admin-sidebar-backdrop" onclick="toggleAdminSidebar()"
            class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 hidden xl:hidden transition-opacity duration-300">
        </div>

        <!-- Sidebar Kiri (Navy & Gold) -->
        @include('admin.layouts.sidebar')

        <!-- Main Content Area (Right Side) -->
        <div class="flex-1 flex flex-col min-w-0 xl:pl-72 transition-all duration-300">
            <!-- Top Navbar -->
            @include('admin.layouts.navbar')

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
                @yield('contents')
            </main>

            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>

    <!-- jQuery (Needed only for Toastr) & SweetAlert2 -->
    <script src="{{ asset('assets_admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Pure Vanilla JS Helper for Tailwind Modals, Dropdowns & Sidebar (Zero Bootstrap Dependency) -->
    <script>
        // 1. Mobile Sidebar Toggle
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('admin-sidebar-backdrop');
            if (!sidebar || !backdrop) return;

            const isClosed = sidebar.classList.contains('-translate-x-full');
            if (isClosed) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }

        // 2. Universal Tailwind Modal Toggle
        function openAdminModal(modalId) {
            // Hilangkan tanda # jika dikirim sebagai #id
            const cleanId = modalId.replace(/^#/, '');
            const modal = document.getElementById(cleanId);
            if (!modal) return;

            // Tutup semua dropdown yang mungkin terbuka
            closeAllAdminDropdowns();

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            modal.setAttribute('aria-hidden', 'false');
        }

        function closeAdminModal(modalId) {
            const cleanId = modalId.replace(/^#/, '');
            const modal = document.getElementById(cleanId);
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            modal.setAttribute('aria-hidden', 'true');
        }

        // 3. Universal Dropdown Toggle
        function toggleAdminDropdown(event, dropdownId) {
            event.stopPropagation();
            const menu = document.getElementById(dropdownId);
            if (!menu) return;

            const isHidden = menu.classList.contains('hidden');
            closeAllAdminDropdowns();

            if (isHidden) {
                menu.classList.remove('hidden');
            }
        }

        function closeAllAdminDropdowns() {
            document.querySelectorAll('.admin-dropdown-menu').forEach(el => {
                el.classList.add('hidden');
            });
        }

        // Tutup dropdown saat klik di luar, dan tutup modal saat klik backdrop atau tekan Escape
        document.addEventListener('click', function(e) {
            closeAllAdminDropdowns();

            if (e.target.classList.contains('admin-modal-backdrop')) {
                e.target.classList.add('hidden');
                e.target.classList.remove('flex');
                e.target.setAttribute('aria-hidden', 'true');
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAllAdminDropdowns();
                document.querySelectorAll('.admin-modal-backdrop:not(.hidden)').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    modal.setAttribute('aria-hidden', 'true');
                });
            }
        });
    </script>

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
