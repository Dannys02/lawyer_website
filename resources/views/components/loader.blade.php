<div id="loading-screen" role="status" aria-live="polite" aria-label="Memuat halaman Kantor Hukum Nurul Safii">
    <div class="loader-content">
        <div class="spinner" aria-hidden="true"></div>
        <span class="loader-text">Memuat halaman...</span>
    </div>
</div>

<style>
    body.loading {
        overflow: hidden;
    }

    #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: #0B162C;
        z-index: 9999999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
    }

    .loader-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
    }

    .loader-text {
        color: #F8FAFC;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.875rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .spinner {
        border: 4px solid rgba(212, 175, 55, 0.2);
        border-top: 4px solid #D4AF37;
        border-radius: 50%;
        width: 52px;
        height: 52px;
        animation: spin 0.9s linear infinite;
    }

    @media (prefers-reduced-motion: reduce) {
        .spinner {
            animation: none;
            border-color: #D4AF37;
        }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    document.body.classList.add('loading');

    window.addEventListener('load', function () {
        setTimeout(() => {
            var loader = document.getElementById('loading-screen');
            if (loader) {
                loader.style.display = 'none';
            }
            document.body.classList.remove('loading');
        }, 250);
    });
</script>
