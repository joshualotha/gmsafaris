<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K1D1ZVHS4L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-K1D1ZVHS4L');
    </script>

    <meta charset="utf-8">
    <title>Page Not Found (404) | Golden Memories Safaris - Tanzania Safari Tours</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="The page you are looking for is not available. Explore our Tanzania safari tours, Serengeti wildlife adventures, Kilimanjaro treks, and Zanzibar beach holidays.">
    <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/webp">
    <link rel="alternate icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com">

    <link rel="canonical" href="https://www.gmsafaris.co.tz/">

    <!-- Bootstrap + FontAwesome + Theme CSS (deferred) -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/style.css') }}?v=2.0" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=2.0">
    </noscript>

    <style>
        .error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 2rem;
        }
        .error-content {
            text-align: center;
            max-width: 600px;
        }
        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #f0ad4e;
            line-height: 1;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .error-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .error-text {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 2rem;
            line-height: 1.7;
        }
        .error-actions .btn {
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            margin: 0.25rem;
            transition: all 0.3s ease;
        }
        .error-actions .btn-primary {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
            color: #fff;
        }
        .error-actions .btn-primary:hover {
            background-color: #e09d3e;
            border-color: #e09d3e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(240, 173, 78, 0.4);
        }
        .error-actions .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }
        .error-actions .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
            transform: translateY(-2px);
        }
        .error-links {
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid #dee2e6;
        }
        .error-links h5 {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .error-links .link-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.5rem 1.5rem;
        }
        .error-links a {
            color: #f0ad4e;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .error-links a:hover {
            color: #e09d3e;
            text-decoration: underline;
        }
        .error-logo {
            margin-bottom: 1.5rem;
        }
        .error-logo img {
            max-height: 60px;
            width: auto;
        }
        @media (max-width: 576px) {
            .error-code {
                font-size: 5rem;
            }
            .error-title {
                font-size: 1.35rem;
            }
            .error-text {
                font-size: 1rem;
            }
            .error-actions .btn {
                display: block;
                width: 100%;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>

<body>
    <div class="error-page">
        <div class="error-content">
            <div class="error-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.webp') }}" alt="Golden Memories Safaris Logo" width="180" height="50" loading="lazy">
                </a>
            </div>

            <div class="error-code">404</div>
            <h1 class="error-title">Page Not Found</h1>
            <p class="error-text">
                The page you're looking for doesn't exist or has been moved.
                Let us help you find the perfect Tanzania safari adventure instead.
            </p>

            <div class="error-actions">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home me-2"></i>Back to Home
                </a>
                <a href="{{ route('safaris') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-safari me-2"></i>Explore Safaris
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>

            <div class="error-links">
                <h5>Popular Destinations</h5>
                <div class="link-group">
                    <a href="{{ route('safaris') }}">Tanzania Safaris</a>
                    <a href="{{ route('destinations') }}">Destinations</a>
                    <a href="{{ route('blog') }}">Travel Blog</a>
                    <a href="{{ route('besttimetovisit') }}">Best Time to Visit</a>
                    <a href="{{ route('booking') }}">Book a Safari</a>
                    <a href="{{ route('about') }}">About Us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (deferred) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
</body>

</html>
