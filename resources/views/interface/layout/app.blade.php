<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}">
    <link rel="shortcut icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <title>@yield('title', 'Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners | Advokat & Konsultan Hukum')</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('interface/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('interface/css/font-awesome/css/all.min.css') }}">

    <!-- Vite Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-ns-ivory text-ns-ink-700 font-sans antialiased overflow-x-hidden is-interface-page">
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

    <!-- Floating Action Hub: Tombol Utama & Pop-up Dua Pilihan (WhatsApp & Chatbot AI) -->
    <div id="action-hub-container" class="fixed bottom-6 right-6 z-50">
        <!-- Floating Hub Toggle Button -->
        <button type="button" id="hub-toggle-btn" onclick="toggleActionHub()"
            aria-label="Buka Menu Bantuan & Konsultasi" aria-expanded="false" aria-controls="hub-popup"
            class="relative w-14 h-14 rounded-full bg-ns-navy-900 text-ns-gold-400 border-2 border-ns-gold-400 shadow-2xl flex items-center justify-center text-2xl hover:bg-ns-gold-400 hover:text-ns-navy-900 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-ns-gold-400 focus:ring-offset-2">

            <!-- Icon Default: Chat / Consultation -->
            <span id="hub-icon-open" class="transition-transform duration-300 transform scale-100 rotate-0">
                <i class="fas fa-comments" aria-hidden="true"></i>
            </span>
            <!-- Icon Close: Ketika Pop-up Terbuka -->
            <span id="hub-icon-close" class="hidden transition-transform duration-300 transform scale-0 rotate-90">
                <i class="fas fa-times text-xl" aria-hidden="true"></i>
            </span>
        </button>

        <!-- Pop-up Menu Konsultasi & AI -->
        <div id="hub-popup" role="dialog" aria-label="Pusat Konsultasi & Bantuan Hukum" aria-hidden="true"
            class="hidden absolute bottom-[calc(100%+14px)] right-0 w-[min(340px,calc(100vw-32px))] bg-ns-navy-900 text-ns-light-100 border border-ns-gold-400/50 border-t-4 border-t-ns-gold-400 rounded-xl shadow-2xl overflow-hidden backdrop-blur-md transition-all duration-200">
            
            <!-- Pop-up Header -->
            <div class="px-5 py-3.5 bg-ns-navy-950/80 border-b border-white/10 flex items-center justify-between">
                <div>
                    <h3 class="font-display font-bold text-sm text-ns-gold-400 m-0">Layanan Konsultasi</h3>
                    <p class="text-[11px] text-ns-light-300 m-0">Pilih saluran konsultasi hukum Anda:</p>
                </div>
                <button type="button" onclick="toggleActionHub()" aria-label="Tutup menu konsultasi"
                    class="w-7 h-7 rounded border border-white/20 text-ns-light-300 hover:text-white hover:border-ns-gold-400 transition flex items-center justify-center text-sm">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Pop-up Menu Options -->
            <div class="p-4 space-y-3">
                <!-- Option 1: WhatsApp Advokat Resmi -->
                <a href="{{ $socialMediaData->wa ?? 'https://wa.link/psypax' }}" target="_blank" rel="noopener noreferrer"
                    class="group flex items-start gap-3.5 p-3 rounded-lg bg-ns-navy-800/80 border border-white/10 hover:border-emerald-500/60 hover:bg-emerald-950/30 transition-all duration-200">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 flex items-center justify-center text-xl flex-shrink-0 group-hover:scale-105 group-hover:bg-emerald-500 group-hover:text-ns-navy-950 transition-all">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-0.5">
                            <h4 class="font-bold text-xs sm:text-sm text-ns-light-100 group-hover:text-emerald-400 transition-colors m-0">
                                WhatsApp
                            </h4>
                        </div>
                        <p class="text-[11px] text-ns-light-300 leading-snug m-0">
                            Konsultasi langsung bersama tim advokat Nurul Safii & Partners.
                        </p>
                    </div>
                </a>

                <!-- Option 2: Chatbot Asisten Hukum AI -->
                <button type="button" onclick="openAiChatModal()"
                    class="w-full text-left group flex items-start gap-3.5 p-3 rounded-lg bg-ns-navy-800/80 border border-white/10 hover:border-ns-gold-400/60 hover:bg-ns-gold-500/10 transition-all duration-200">
                    <div class="w-10 h-10 rounded-lg bg-ns-gold-400/20 text-ns-gold-400 border border-ns-gold-400/40 flex items-center justify-center text-xl flex-shrink-0 group-hover:scale-105 group-hover:bg-ns-gold-400 group-hover:text-ns-navy-950 transition-all">
                        <i class="fas fa-robot" aria-hidden="true"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-0.5">
                            <h4 class="font-bold text-xs sm:text-sm text-ns-light-100 group-hover:text-ns-gold-400 transition-colors m-0">
                                Asisten Hukum AI
                            </h4>
                        </div>
                        <p class="text-[11px] text-ns-light-300 leading-snug m-0">
                            Tanya jawab instan seputar dasar hukum, prosedur, & informasi literatur.
                        </p>
                    </div>
                </button>
            </div>

            <!-- Pop-up Footer -->
            <div class="px-5 py-2.5 bg-ns-navy-950 border-t border-white/10 text-center">
                <span class="text-[10px] text-ns-light-300/80">
                    Kerahasiaan data klien terjamin &bull; Nurul Safii &amp; Partners
                </span>
            </div>
        </div>
    </div>

    <!-- Modal Interaktif Chatbot AI -->
    <div id="ai-chat-modal" role="dialog" aria-label="Asisten Hukum AI" aria-hidden="true"
        class="hidden fixed inset-0 z-[999999] flex items-center justify-center p-4 sm:p-6 bg-black/60 backdrop-blur-sm">
        <div class="relative w-full max-w-lg bg-ns-navy-900 border-2 border-ns-gold-400 rounded-2xl shadow-2xl flex flex-col h-[560px] max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="px-5 py-4 bg-ns-navy-950 border-b border-ns-gold-400/40 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-ns-gold-400/20 border border-ns-gold-400 text-ns-gold-400 flex items-center justify-center text-lg">
                        <i class="fas fa-balance-scale" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-sm sm:text-base text-ns-light-100 m-0 flex items-center gap-2">
                            <span>Asisten Hukum Virtual AI</span>
                        </h3>
                        <p class="text-[11px] text-ns-gold-400 m-0">Kantor Hukum Nurul Safii &amp; Partners</p>
                    </div>
                </div>
                <button type="button" onclick="closeAiChatModal()" aria-label="Tutup Chatbot AI"
                    class="w-8 h-8 rounded-full border border-white/20 text-ns-light-300 hover:text-white hover:border-ns-gold-400 hover:bg-ns-navy-800 transition flex items-center justify-center text-sm">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Chat Messages Log Container -->
            <div id="ai-messages-container" data-lenis-prevent class="flex-1 min-h-0 overscroll-contain overflow-y-auto p-4 sm:p-5 space-y-4 text-xs sm:text-sm bg-ns-navy-900/90">
                <!-- Sambutan Awal Bot -->
                <div class="flex items-start gap-2.5">
                    <div class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-950 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5">
                        <i class="fas fa-robot text-[11px]"></i>
                    </div>
                    <div class="bg-ns-navy-800 border border-ns-gold-400/30 rounded-2xl rounded-tl-none p-3.5 text-ns-light-100 max-w-[85%] shadow">
                        <p class="m-0 leading-relaxed">
                            Halo! Saya <strong>Asisten Virtual Kantor Hukum Nurul Safii</strong>. Anda dapat bertanya mengenai jenis layanan hukum, prosedur konsultasi, atau topik literatur hukum kami.
                        </p>
                        <div class="mt-2.5 pt-2 border-t border-white/10 flex flex-wrap gap-1.5">
                            <button type="button" onclick="sendQuickPrompt('Bagaimana prosedur konsultasi perkara pidana?')" class="text-[11px] bg-ns-navy-950 text-ns-gold-400 hover:text-white border border-ns-gold-500/30 rounded px-2.5 py-1 transition">
                                Prosedur Perkara Pidana
                            </button>
                            <button type="button" onclick="sendQuickPrompt('Layanan hukum apa saja yang tersedia?')" class="text-[11px] bg-ns-navy-950 text-ns-gold-400 hover:text-white border border-ns-gold-500/30 rounded px-2.5 py-1 transition">
                                Layanan Hukum Kami
                            </button>
                            <button type="button" onclick="sendQuickPrompt('Bagaimana cara membuat janji temu dengan Advokat Nurul Safii?')" class="text-[11px] bg-ns-navy-950 text-ns-gold-400 hover:text-white border border-ns-gold-500/30 rounded px-2.5 py-1 transition">
                                Janji Temu Kantor
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer / Chat Input -->
            <div class="p-3 bg-ns-navy-950 border-t border-ns-gold-400/30">
                <form id="ai-chat-form" onsubmit="handleAiChatSubmit(event)" class="flex items-center gap-2">
                    <input type="text" id="ai-user-input" placeholder="Tuliskan pertanyaan hukum Anda di sini..." autocomplete="off"
                        class="flex-1 min-h-[42px] px-3.5 bg-ns-navy-900 border border-white/20 text-ns-light-100 rounded-lg text-xs sm:text-sm focus:outline-none focus:border-ns-gold-400 placeholder:text-ns-light-300/50" />
                    <button type="submit"
                        class="min-h-[42px] px-4 bg-ns-gold-400 text-ns-navy-950 font-bold text-xs uppercase tracking-wider rounded-lg hover:bg-white hover:text-ns-navy-900 transition flex items-center justify-center gap-1.5">
                        <span>Kirim</span>
                        <i class="fas fa-paper-plane text-xs" aria-hidden="true"></i>
                    </button>
                </form>
                <div class="mt-2 text-center text-[10px] text-ns-light-300/70">
                    *Jawaban AI bersifat informasi awal. Untuk opini hukum resmi mengikat, silakan hubungi advokat kami.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global Lock & Unlock Scroll Management tanpa mengubah posisi scroll
        var activeScrollLocks = 0;
        var lockedScrollY = 0;

        function preventScrollAction(e) {
            // Izinkan scroll hanya jika target berada di dalam elemen yang memang scrollable (misal konten chat AI, menu mobile, body modal)
            var scrollable = e.target.closest('#ai-messages-container, #mobile-menu, .modal-body, [data-scrollable="true"]');
            if (scrollable) return;
            e.preventDefault();
        }

        function preventScrollKeyAction(e) {
            var scrollable = e.target.closest('#ai-messages-container, #mobile-menu, .modal-body, input, textarea');
            if (scrollable) return;
            var keys = ['ArrowUp', 'ArrowDown', 'PageUp', 'PageDown', 'Home', 'End', 'Space', ' '];
            if (keys.indexOf(e.key) !== -1 || e.keyCode === 32 || (e.keyCode >= 33 && e.keyCode <= 40)) {
                e.preventDefault();
            }
        }

        window.lockPageScroll = function() {
            activeScrollLocks++;
            if (activeScrollLocks === 1) {
                // Simpan koordinat scroll saat ini
                lockedScrollY = window.lenis ? (window.lenis.scroll || window.scrollY || 0) : (window.scrollY || window.pageYOffset || 0);

                // Kunci event mousewheel, sentuhan layar, dan keyboard
                window.addEventListener('wheel', preventScrollAction, { passive: false });
                window.addEventListener('touchmove', preventScrollAction, { passive: false });
                window.addEventListener('keydown', preventScrollKeyAction, false);

                // Hentikan Lenis agar tidak memproses scroll ke posisi mana pun
                if (window.lenis && typeof window.lenis.stop === 'function') {
                    window.lenis.stop();
                }
            }
        };

        window.unlockPageScroll = function(force) {
            if (force) {
                activeScrollLocks = 0;
            } else {
                activeScrollLocks = Math.max(0, activeScrollLocks - 1);
            }
            if (activeScrollLocks === 0) {
                window.removeEventListener('wheel', preventScrollAction);
                window.removeEventListener('touchmove', preventScrollAction);
                window.removeEventListener('keydown', preventScrollKeyAction);

                if (window.lenis && typeof window.lenis.start === 'function') {
                    window.lenis.start();
                }
            }
        };

        function toggleActionHub() {
            var popup = document.getElementById("hub-popup");
            var btn = document.getElementById("hub-toggle-btn");
            var iconOpen = document.getElementById("hub-icon-open");
            var iconClose = document.getElementById("hub-icon-close");

            if (!popup || !btn) return;
            var isHidden = popup.classList.contains("hidden");

            if (isHidden) {
                popup.classList.remove("hidden");
                popup.setAttribute("aria-hidden", "false");
                btn.setAttribute("aria-expanded", "true");
                iconOpen.classList.add("hidden");
                iconClose.classList.remove("hidden");
                iconClose.classList.remove("scale-0", "rotate-90");
                iconClose.classList.add("scale-100", "rotate-0");
                window.lockPageScroll();
            } else {
                popup.classList.add("hidden");
                popup.setAttribute("aria-hidden", "true");
                btn.setAttribute("aria-expanded", "false");
                iconClose.classList.add("hidden");
                iconOpen.classList.remove("hidden");
                window.unlockPageScroll();
            }
        }

        function openAiChatModal() {
            // Tutup pop-up menu terlebih dahulu jika terbuka
            var popup = document.getElementById("hub-popup");
            if (popup && !popup.classList.contains("hidden")) {
                toggleActionHub();
            }
            var modal = document.getElementById("ai-chat-modal");
            if (modal) {
                modal.classList.remove("hidden");
                modal.setAttribute("aria-hidden", "false");
                window.lockPageScroll();
                setTimeout(function() {
                    var input = document.getElementById("ai-user-input");
                    if (input) input.focus();
                }, 100);
            }
        }

        function closeAiChatModal() {
            var modal = document.getElementById("ai-chat-modal");
            if (modal && !modal.classList.contains("hidden")) {
                modal.classList.add("hidden");
                modal.setAttribute("aria-hidden", "true");
                window.unlockPageScroll();
            }
        }

        function sendQuickPrompt(text) {
            var input = document.getElementById("ai-user-input");
            if (input) {
                input.value = text;
                var form = document.getElementById("ai-chat-form");
                if (form) {
                    form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                }
            }
        }

        var aiChatHistory = [];
        var aiIsSubmitting = false;

        function formatAiReplyHtml(text) {
            var safe = escapeHtml(text || '');
            // Bold **teks**
            safe = safe.replace(/\*\*(.+?)\*\*/g, '<strong class="text-ns-gold-400 font-semibold">$1</strong>');
            // Auto-link URLs
            safe = safe.replace(/(https?:\/\/[^\s<]+)/g, function(url) {
                var cleanUrl = url.replace(/[.,;!?)]+$/, '');
                var trailing = url.slice(cleanUrl.length);
                return '<a href="' + cleanUrl + '" target="_blank" rel="noopener noreferrer" class="text-ns-gold-400 underline font-semibold break-all hover:text-white">' + cleanUrl + '</a>' + trailing;
            });
            // Newlines
            safe = safe.replace(/\n/g, '<br>');
            return safe;
        }

        function handleAiChatSubmit(e) {
            e.preventDefault();
            if (aiIsSubmitting) return;

            var input = document.getElementById("ai-user-input");
            var container = document.getElementById("ai-messages-container");
            if (!input || !container) return;

            var userQuery = input.value.trim();
            if (!userQuery) return;

            aiIsSubmitting = true;
            input.disabled = true;

            // Render pesan user
            var userBubble = document.createElement("div");
            userBubble.className = "flex items-start justify-end gap-2.5";
            userBubble.innerHTML = '<div class="bg-ns-gold-400 text-ns-navy-950 font-medium rounded-2xl rounded-tr-none p-3.5 w-fit shadow text-right leading-relaxed">' +
                escapeHtml(userQuery) +
                '</div>' +
                '<div class="w-7 h-7 rounded-full bg-ns-navy-800 border border-ns-gold-400 text-ns-gold-400 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5"><i class="fas fa-user text-[11px]"></i></div>';
            container.appendChild(userBubble);
            input.value = "";
            container.scrollTop = container.scrollHeight;

            // Typing indicator bot
            var typingId = "ai-typing-" + Date.now();
            var typingBubble = document.createElement("div");
            typingBubble.id = typingId;
            typingBubble.className = "flex items-start gap-2.5";
            typingBubble.innerHTML = '<div class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-950 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5"><i class="fas fa-robot text-[11px]"></i></div>' +
                '<div class="bg-ns-navy-800 border border-white/10 rounded-2xl rounded-tl-none p-3 text-ns-light-300 italic flex items-center gap-2">' +
                '<span class="inline-block w-2 h-2 rounded-full bg-ns-gold-400 animate-ping"></span> Menganalisis respon hukum...' +
                '</div>';
            container.appendChild(typingBubble);
            container.scrollTop = container.scrollHeight;

            var csrfMeta = document.querySelector('meta[name="csrf-token"]');
            var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

            fetch("{{ route('chatbot.ask') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    message: userQuery,
                    history: aiChatHistory.slice(-10)
                })
            })
            .then(function(response) {
                return response.json().then(function(data) {
                    return { status: response.status, data: data };
                });
            })
            .then(function(result) {
                var typingEl = document.getElementById(typingId);
                if (typingEl) typingEl.remove();

                var botReplyText = (result.data && result.data.reply)
                    ? result.data.reply
                    : 'Maaf, terjadi kendala saat memproses pertanyaan Anda.';

                if (result.status === 200) {
                    aiChatHistory.push({ role: 'user', text: userQuery });
                    aiChatHistory.push({ role: 'model', text: botReplyText });
                    if (aiChatHistory.length > 10) {
                        aiChatHistory = aiChatHistory.slice(-10);
                    }
                }

                var botBubble = document.createElement("div");
                botBubble.className = "flex items-start gap-2.5";
                botBubble.innerHTML = '<div class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-950 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5"><i class="fas fa-robot text-[11px]"></i></div>' +
                    '<div class="bg-ns-navy-800 border border-ns-gold-400/30 rounded-2xl rounded-tl-none p-3.5 text-ns-light-100 max-w-[85%] shadow leading-relaxed">' +
                    formatAiReplyHtml(botReplyText) +
                    '</div>';
                container.appendChild(botBubble);
                container.scrollTop = container.scrollHeight;
            })
            .catch(function() {
                var typingEl = document.getElementById(typingId);
                if (typingEl) typingEl.remove();

                var errBubble = document.createElement("div");
                errBubble.className = "flex items-start gap-2.5";
                errBubble.innerHTML = '<div class="w-7 h-7 rounded-full bg-ns-gold-400 text-ns-navy-950 flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5"><i class="fas fa-robot text-[11px]"></i></div>' +
                    '<div class="bg-ns-navy-800 border border-red-500/40 rounded-2xl rounded-tl-none p-3.5 text-ns-light-100 max-w-[85%] shadow leading-relaxed">' +
                    'Maaf, koneksi ke asisten AI sedang terganggu. Silakan coba lagi atau hubungi WhatsApp resmi kami.' +
                    '</div>';
                container.appendChild(errBubble);
                container.scrollTop = container.scrollHeight;
            })
            .finally(function() {
                aiIsSubmitting = false;
                input.disabled = false;
                input.focus();
            });
        }

        function escapeHtml(text) {
            var div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Handle Escape Key & Click Outside
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") {
                var popup = document.getElementById("hub-popup");
                if (popup && !popup.classList.contains("hidden")) {
                    toggleActionHub();
                }
                closeAiChatModal();
            }
        });

        document.addEventListener("click", function(e) {
            var container = document.getElementById("action-hub-container");
            var popup = document.getElementById("hub-popup");
            if (container && popup && !popup.classList.contains("hidden")) {
                if (!container.contains(e.target)) {
                    toggleActionHub();
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
