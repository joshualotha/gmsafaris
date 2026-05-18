<!-- Topbar Start -->
<div class="container-fluid topbar d-block">
    <div class="container">
        <div class="row align-items-center">
            {{-- Left: Phone, Email, Hours (hidden on mobile) --}}
            <div class="col-md-7 d-none d-md-block text-center text-md-start">
                <div class="d-inline-flex align-items-center gap-3" style="line-height: 1;">
                    <a href="tel:+255786383273" class="text-dark text-decoration-none topbar-link" style="font-size: 0.8rem;">
                        <i class="fas fa-phone-alt text-dark me-1" style="font-size: 0.7rem;"></i> +255 786 383 273
                    </a>
                    <a href="mailto:info@gmsafaris.co.tz" class="text-dark text-decoration-none topbar-link d-none d-md-inline" style="font-size: 0.8rem;">
                        <i class="fas fa-envelope text-dark me-1" style="font-size: 0.7rem;"></i> info@gmsafaris.co.tz
                    </a>
                    <span class="text-dark d-none d-xl-inline" style="font-size: 0.75rem;">
                        <i class="fas fa-clock text-dark me-1" style="font-size: 0.65rem;"></i> Mon-Sun: 8AM - 6PM
                    </span>
                </div>
            </div>
            {{-- Right: GTranslate + Social (desktop) / Book Now + GTranslate (mobile) --}}
            <div class="col-md-5 col-12 text-center text-md-end">
                <div class="d-inline-flex align-items-center justify-content-between w-100" style="gap: 4px;">
                    {{-- GTranslate flags — always visible --}}
                    <div class="gtranslate_wrapper"></div>
                    {{-- Book Now button — mobile only --}}
                    <a href="{{ route('booking') }}" class="btn btn-sm btn-dark rounded-pill px-3 d-md-none fw-bold" style="font-size: 0.75rem; padding: 3px 14px;">
                        Book Now
                    </a>
                    {{-- Social icons — desktop only --}}
                    <span class="d-none d-md-inline-flex align-items-center" style="gap: 4px;">
                        <a href="https://www.facebook.com/gmsafaris" target="_blank" rel="noopener noreferrer"
                           class="topbar-social" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/gmsafaris/" target="_blank" rel="noopener noreferrer"
                           class="topbar-social" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@gmsafaris" target="_blank" rel="noopener noreferrer"
                           class="topbar-social" aria-label="TikTok">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </span>
                </div>
            </div>
            <script>
            window.gtranslateSettings = {"default_language":"en","languages":["en","it","pl","de","sv","fr","ko"],"wrapper_selector":".gtranslate_wrapper"}
            </script>
            <script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>
        </div>
    </div>
</div>
<style>
    .topbar {
        background: linear-gradient(135deg, #d69c40 0%, #e8b84b 100%);
        padding: 3px 0;
        border-bottom: 1px solid #c48c30;
        line-height: 1;
    }
    .topbar-link {
        transition: opacity 0.2s;
    }
    .topbar-link:hover {
        opacity: 0.75;
    }
    .topbar-social {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: rgba(0,0,0,0.1);
        color: #222 !important;
        font-size: 0.7rem;
        transition: background 0.2s;
    }
    .topbar-social:hover {
        background: rgba(0,0,0,0.2);
        color: #000 !important;
    }
    .nav-bar {
        padding-top: 0 !important;
    }
    /* GTranslate flags in topbar — smaller with spacing */
    .topbar .gtranslate_wrapper {
        display: inline-flex !important;
        align-items: center;
        vertical-align: middle;
        gap: 6px;
    }
    .topbar .gtranslate_wrapper a {
        margin: 0 2px !important;
        opacity: 0.85;
        transition: opacity 0.2s;
    }
    .topbar .gtranslate_wrapper a:hover {
        opacity: 1;
    }
    .topbar .gtranslate_wrapper img {
        width: 18px !important;
        height: 12px !important;
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    }
</style>
<!-- Topbar End -->
