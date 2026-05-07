<!-- JavaScript Libraries (all deferred to eliminate render-blocking) -->
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script defer src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script defer src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script defer src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script defer src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script defer src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script defer src="{{ asset('js/main.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize lightbox
        if (typeof lightbox !== 'undefined') {
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            });
        }
        // Initialize WOW.js
        if (typeof WOW !== 'undefined') {
            new WOW().init();
        }
    });
</script>
