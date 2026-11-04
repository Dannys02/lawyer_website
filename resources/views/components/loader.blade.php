<div id="loading-screen" role="status" aria-live="polite" aria-label="Memuat portal Kantor Hukum Nurul Syafii">
    <!-- Latar Belakang Ambient Glow Elegan -->
    <div class="loader-backdrop-glow" aria-hidden="true"></div>

    <div class="loader-wrapper">
        <!-- Lambang Timbangan Keadilan & Cincin Emas Berotasi Halus -->
        <div class="loader-emblem-container">
            <div class="loader-ring-pulse" aria-hidden="true"></div>
            <div class="loader-ring-spin" aria-hidden="true"></div>
            
            <div class="loader-logo-frame">
                <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" 
                     alt="Lambang Kantor Hukum Nurul Syafii" 
                     class="loader-logo-img" />
            </div>
        </div>

        <!-- Tipografi Filosofis Firma Hukum -->
        <div class="loader-brand-block">
            <span class="loader-firm-name">KANTOR HUKUM NURUL SYAFII</span>
            <span class="loader-firm-motto">JUSTITIA ET FIDES &bull; INTEGRITAS &amp; KEADILAN</span>
        </div>

        <!-- Garis Progress Emas Sinematik -->
        <div class="loader-progress-track" aria-hidden="true">
            <div class="loader-progress-bar"></div>
        </div>

        <!-- Teks Status Memuat -->
        <span class="loader-caption">Memuat Sistem...</span>
    </div>
</div>

<style>
    body.loading {
        overflow: hidden !important;
    }

    #loading-screen {
        position: fixed;
        inset: 0;
        width: 100vw;
        height: 100vh;
        background: radial-gradient(circle at center, #0F1E3A 0%, #070F1E 85%, #040812 100%);
        z-index: 9999999;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
        visibility: visible;
        transition: opacity 0.45s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.45s ease;
        pointer-events: all;
    }

    #loading-screen.loader-fade-out {
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }

    .loader-backdrop-glow {
        position: absolute;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.12) 0%, rgba(11, 22, 44, 0) 70%);
        border-radius: 50%;
        filter: blur(40px);
        pointer-events: none;
        animation: glowPulse 3s ease-in-out infinite;
    }

    .loader-wrapper {
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 24px;
        max-width: 90vw;
    }

    /* Emblem & Rings */
    .loader-emblem-container {
        position: relative;
        width: 96px;
        height: 96px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
    }

    .loader-ring-pulse {
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 1px solid rgba(212, 175, 55, 0.35);
        animation: ringPulse 2.4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .loader-ring-spin {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 2px solid rgba(212, 175, 55, 0.15);
        border-top: 2px solid #D4AF37;
        border-right: 2px solid rgba(226, 184, 66, 0.7);
        animation: emblemSpin 1.6s cubic-bezier(0.5, 0.1, 0.5, 0.9) infinite;
    }

    .loader-logo-frame {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background-color: #070F1E;
        border: 1px solid rgba(212, 175, 55, 0.4);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6), inset 0 0 12px rgba(212, 175, 55, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        position: relative;
        z-index: 2;
    }

    .loader-logo-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 2px 8px rgba(212, 175, 55, 0.35));
    }

    /* Brand Typography */
    .loader-brand-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        margin-bottom: 20px;
    }

    .loader-firm-name {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 0.9375rem;
        letter-spacing: 0.16em;
        color: #F8FAFC;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .loader-firm-motto {
        font-family: 'Poppins', sans-serif;
        font-size: 0.6875rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        color: #D4AF37;
        text-transform: uppercase;
        opacity: 0.9;
    }

    /* Progress Line */
    .loader-progress-track {
        width: 180px;
        height: 2px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 999px;
        overflow: hidden;
        position: relative;
        margin-bottom: 12px;
    }

    .loader-progress-bar {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 45%;
        background: linear-gradient(90deg, transparent, #E2B842, #D4AF37, transparent);
        border-radius: 999px;
        animation: progressSlide 1.5s ease-in-out infinite;
    }

    .loader-caption {
        font-family: 'Poppins', sans-serif;
        font-size: 0.72rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #94A3B8;
        font-weight: 400;
    }

    /* Animations */
    @keyframes emblemSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes glowPulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.15); opacity: 0.95; }
    }

    @keyframes ringPulse {
        0% { transform: scale(0.9); opacity: 0.7; }
        50% { transform: scale(1.15); opacity: 0.15; }
        100% { transform: scale(0.9); opacity: 0.7; }
    }

    @keyframes progressSlide {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(350%); }
    }

    /* Accessibility Reduced Motion */
    @media (prefers-reduced-motion: reduce) {
        .loader-ring-spin,
        .loader-ring-pulse,
        .loader-progress-bar,
        .loader-backdrop-glow {
            animation: none !important;
        }
        .loader-ring-spin {
            border-color: #D4AF37;
        }
        .loader-progress-bar {
            width: 100%;
            background: #D4AF37;
            transform: none !important;
        }
    }
</style>

<script>
    document.body.classList.add('loading');

    function dismissLoader() {
        var loader = document.getElementById('loading-screen');
        if (loader) {
            loader.classList.add('loader-fade-out');
            setTimeout(function () {
                loader.style.display = 'none';
                document.body.classList.remove('loading');
            }, 450);
        } else {
            document.body.classList.remove('loading');
        }
    }

    // Dismiss saat seluruh resource selesai dimuat
    if (document.readyState === 'complete') {
        setTimeout(dismissLoader, 200);
    } else {
        window.addEventListener('load', function () {
            setTimeout(dismissLoader, 250);
        });
    }

    // Fallback safety timeout jika ada aset lambat
    setTimeout(dismissLoader, 4000);
</script>
