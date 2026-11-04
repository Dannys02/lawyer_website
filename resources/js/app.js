import './bootstrap';
import Lenis from 'lenis';

// Inisialisasi Smooth Scroll (Hanya untuk Halaman Interface Publik)
document.addEventListener('DOMContentLoaded', () => {
    const isInterfacePage = document.body.classList.contains('is-interface-page');
    if (!isInterfacePage) return;

    // Cek preferensi pengguna yang mematikan reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    // Inisialisasi Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Smooth exponential ease-out
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        wheelMultiplier: 0.95,
        touchMultiplier: 1.5,
        infinite: false,
    });

    window.lenis = lenis;

    // Jika sedang dalam kondisi loading, pastikan Lenis langsung dihentikan
    if (document.documentElement.classList.contains('is-locked-loading') || document.body.classList.contains('is-locked-loading')) {
        lenis.stop();
    }

    // Render loop untuk Lenis
    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // Parallax Scroll Effect khusus elemen pada section hero/banner home
    const heroBg = document.getElementById('hero-parallax-bg');
    const heroCard = document.getElementById('hero-credential-card');

    if (heroBg || heroCard) {
        lenis.on('scroll', (e) => {
            const scrollY = e.animatedScroll || window.scrollY || 0;
            const maxScroll = 900; // Rentang aktif efek hero banner

            if (scrollY <= maxScroll) {
                // Efek gambar latar: bergerak ke atas lebih lambat (kecepatan 0.38x dari scroll halaman)
                if (heroBg) {
                    const bgTranslateY = scrollY * 0.38;
                    heroBg.style.transform = `translate3d(0, ${bgTranslateY}px, 0)`;
                }

                // Efek kartu kredensial samping kanan: melayang lembut ke atas (kecepatan 0.12x)
                if (heroCard && window.innerWidth >= 1024) {
                    const cardTranslateY = -scrollY * 0.12;
                    heroCard.style.transform = `translate3d(0, ${cardTranslateY}px, 0)`;
                }
            }
        });
    }

    // Dukungan navigasi anchor link (misal #layanan-hukum, #profil-kantor) agar smooth
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href !== '#' && href.startsWith('#')) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    lenis.scrollTo(target, {
                        offset: -80,
                        duration: 1.4,
                    });
                }
            }
        });
    });
});
