<!-- Navbar start -->
<div class="container-fluid nav-bar">
    <div class="container">
        <nav class="navbar navbar-light navbar-expand-md py-3">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ site_image('logo') }}" alt="Golden Memories Safaris Logo" class="img-fluid"
                    width="180" height="50" style="max-height: 50px; width: auto;">
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-label="Toggle navigation menu">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link @if(Route::currentRouteNamed('home')) active @endif">Home</a>
                    <a href="{{ route('safaris') }}" class="nav-item nav-link @if(Route::currentRouteNamed('safaris') || Route::currentRouteNamed('safari.show')) active @endif">Safaris</a>
                    <a href="{{ route('destinations') }}" class="nav-item nav-link @if(Route::currentRouteNamed('destinations') || Route::currentRouteNamed('destination.show')) active @endif">Destinations</a>
                    <a href="{{ route('blog') }}" class="nav-item nav-link @if(Route::currentRouteNamed('blog') || Route::currentRouteNamed('blog.show')) active @endif">Blog</a>
                    <a href="{{ route('testimonial') }}" class="nav-item nav-link @if(Route::currentRouteNamed('testimonial')) active @endif">Reviews</a>
                    <a href="{{ route('gallery') }}" class="nav-item nav-link @if(Route::currentRouteNamed('gallery')) active @endif">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                        <div class="dropdown-menu bg-light">
                            <a href="{{ route('about') }}" class="dropdown-item">About Us</a>
                            <a href="{{ route('join-safari.index') }}" class="dropdown-item">Join a Safari</a>
                            <a href="{{ route('besttimetovisit') }}" class="dropdown-item">Best Time to Visit</a>
                            <a href="{{ route('visa') }}" class="dropdown-item">Visa Guide</a>
                            <a href="{{ route('kilimanjaroroutes') }}" class="dropdown-item">Kilimanjaro Routes</a>
                            <a href="{{ route('booking') }}" class="dropdown-item">Book Now</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link @if(Route::currentRouteNamed('contact')) active @endif">Contact</a>
                </div>
                <!-- Search Toggle -->
                <button class="btn-search btn btn-primary btn-md-square me-2 rounded-circle d-none d-lg-inline-flex"
                    data-bs-toggle="modal" data-bs-target="#searchModal" aria-label="Open search"><i class="fas fa-search"></i></button>
                <!-- Book Now CTA — visible on all screen sizes where navbar is expanded -->
                <a href="{{ route('booking') }}" class="btn btn-primary py-2 px-4 d-none d-lg-inline-block rounded-pill fw-bold">Book Now</a>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
