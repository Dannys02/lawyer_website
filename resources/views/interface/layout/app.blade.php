<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}">
    <link rel="shortcut icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <title>@yield('title', 'Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners | Advokat & Konsultan Hukum')</title>

    <!-- Google Fonts: Cormorant Garamond, Playfair Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('interface/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('interface/css/font-awesome/css/all.min.css') }}">

    <!-- Vite Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-ns-ivory text-ns-ink-700 font-sans antialiased overflow-x-hidden">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-4 focus:z-[9999999] focus:bg-ns-gold-400 focus:text-ns-navy-900 focus:font-bold focus:px-5 focus:py-2.5 focus:rounded shadow-lg">
        Lewati ke konten utama
    </a>

    <x-loader />

    <header class="fixed top-0 left-0 right-0 w-full z-50 transition-colors duration-200" id="main-header">
        <div class="w-full bg-ns-navy-900/95 backdrop-blur border-b border-ns-gold-500/30 shadow-md transition-all duration-200" id="navbar-wrapper">
            @include('interface.layout.navbar')
        </div>
    </header>

    <main id="main-content" tabindex="-1" class="outline-none">
        @yield('content')
        @stack('content')
    </main>

    @include('interface.layout.footer')

    <!-- Tombol WA -->
    <button type="button" id="wa-button" onclick="togglePopup()" aria-label="Buka jendela obrolan WhatsApp" aria-expanded="false" aria-controls="wa-popup"
        class="fixed bottom-6 right-6 w-14 h-14 rounded-full bg-ns-navy-900 text-ns-gold-400 border-2 border-ns-gold-400 shadow-xl z-50 flex items-center justify-center text-2xl hover:bg-ns-gold-400 hover:text-ns-navy-900 hover:-translate-y-1 transition duration-200 focus:outline-none focus:ring-2 focus:ring-ns-gold-400 focus:ring-offset-2">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </button>

    <!-- Pop-up WA -->
    <div id="wa-popup" role="dialog" aria-label="Konsultasi via WhatsApp" aria-hidden="true"
        class="hidden fixed bottom-24 right-6 w-[min(320px,calc(100vw-32px))] bg-ns-navy-900 text-ns-light-100 border border-ns-gold-400 border-t-4 border-t-ns-gold-400 p-5 rounded-lg shadow-2xl z-50">
        <div class="flex justify-between items-center pb-2 mb-3 border-b border-white/10 font-display font-bold text-ns-gold-400">
            <span class="text-sm">Layanan Konsultasi Hukum</span>
            <button type="button" class="w-8 h-8 rounded border border-white/20 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 flex items-center justify-center text-lg leading-none transition" onclick="togglePopup()" aria-label="Tutup jendela WhatsApp">&times;</button>
        </div>
        <p class="text-xs text-ns-light-300 leading-relaxed mb-4">Butuh pendampingan atau konsultasi hukum? Tim advokat kami siap membantu Anda.</p>
        <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer"
            class="flex items-center justify-center gap-2 min-h-[44px] bg-ns-gold-400 text-ns-navy-900 font-bold text-sm rounded px-4 py-2 hover:bg-white transition duration-150">
            <i class="fab fa-whatsapp text-base" aria-hidden="true"></i> Hubungi via WhatsApp
        </a>
    </div>

    <script>
        function togglePopup() {
            var popup = document.getElementById("wa-popup");
            var btn = document.getElementById("wa-button");
            if (!popup || !btn) return;
            var isHidden = popup.classList.contains("hidden");
            if (isHidden) {
                popup.classList.remove("hidden");
                popup.setAttribute("aria-hidden", "false");
                btn.setAttribute("aria-expanded", "true");
            } else {
                popup.classList.add("hidden");
                popup.setAttribute("aria-hidden", "true");
                btn.setAttribute("aria-expanded", "false");
            }
        }

        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") {
                var popup = document.getElementById("wa-popup");
                var btn = document.getElementById("wa-button");
                if (popup && !popup.classList.contains("hidden")) {
                    popup.classList.add("hidden");
                    popup.setAttribute("aria-hidden", "true");
                    if (btn) {
                        btn.setAttribute("aria-expanded", "false");
                        btn.focus();
                    }
                }
            }
        });

        // Sticky Navbar shadow effect on scroll
        window.addEventListener('scroll', function() {
            var wrapper = document.getElementById('navbar-wrapper');
            if (wrapper) {
                if (window.scrollY >= 40) {
                    wrapper.classList.add('bg-ns-navy-950', 'shadow-2xl');
                    wrapper.classList.remove('bg-ns-navy-900/95');
                } else {
                    wrapper.classList.remove('bg-ns-navy-950', 'shadow-2xl');
                    wrapper.classList.add('bg-ns-navy-900/95');
                }
            }
        }, { passive: true });
    </script>
    @stack('script')
</body>

</html>
