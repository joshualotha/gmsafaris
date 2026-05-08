<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Quill Rich Text Editor (Free, MIT License) -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.min.js"></script>

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #D4A762;
            --primary-dark: #B8924A;
            --sidebar-bg: #050709;
            --sidebar-hover: #1a1c1f;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Open Sans', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            background: #FFFCF8;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-brand img { max-height: 40px; }
        .sidebar-brand span { font-weight: 600; font-size: 1rem; color: var(--primary-color); }

        .sidebar-menu { padding: 1rem 0; }
        .sidebar-menu .menu-label {
            padding: 0.5rem 1.5rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.4);
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 1.5rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--sidebar-hover);
            color: var(--primary-color);
        }

        .sidebar-menu a i { width: 20px; text-align: center; font-size: 1rem; }
        .sidebar-menu a .badge { margin-left: auto; }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Top Navbar */
        .topbar {
            background: #fff;
            padding: 0.8rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 999;
            border-bottom: 2px solid var(--primary-color);
        }

        .topbar-left { display: flex; align-items: center; gap: 1rem; }
        .topbar-left h5 { margin: 0; font-weight: 600; color: #050709; }

        .topbar-right { display: flex; align-items: center; gap: 1rem; }
        .topbar-right .user-info { text-align: right; }
        .topbar-right .user-info small { display: block; color: #888; font-size: 0.75rem; }
        .topbar-right .user-info strong { font-size: 0.9rem; color: #050709; }

        .content-wrapper { padding: 1.5rem 2rem; }

        /* Cards */
        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            transition: transform 0.2s;
            border: 1px solid rgba(212, 167, 98, 0.15);
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 15px rgba(212, 167, 98, 0.2); }
        .stat-card .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
        }
        .stat-card .stat-number { font-size: 1.8rem; font-weight: 700; margin: 0; color: #050709; }
        .stat-card .stat-label { color: #888; font-size: 0.85rem; margin: 0; }

        /* Tables */
        .table-container {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            border: 1px solid rgba(212, 167, 98, 0.15);
        }

        .table-container .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .table-container .table-header h5 { margin: 0; font-weight: 600; color: #050709; }

        .table th { font-weight: 600; font-size: 0.85rem; color: #555; border-top: none; }
        .table td { vertical-align: middle; font-size: 0.9rem; }

        /* Buttons */
        .btn-gold {
            background: var(--primary-color);
            color: #fff;
            border: none;
        }
        .btn-gold:hover { background: var(--primary-dark); color: #fff; }

        .btn-primary {
            background: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #fff !important;
        }
        .btn-primary:hover {
            background: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
            color: #fff !important;
        }
        .btn-outline-primary {
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        .btn-outline-primary:hover {
            background: var(--primary-color) !important;
            color: #fff !important;
        }

        /* Alerts */
        .alert-flash {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
        }

        /* Toggle button for mobile */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .sidebar-toggle { display: block; }
            .content-wrapper { padding: 1rem; }
            .topbar { padding: 0.8rem 1rem; }
        }

        /* Status badges */
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-confirmed { background: #d4edda; color: #155724; }
        .badge-cancelled { background: #f8d7da; color: #721c24; }
        .badge-completed { background: #d1ecf1; color: #0c5460; }

        /* Form styles */
        .form-card {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            border: 1px solid rgba(212, 167, 98, 0.15);
        }

        .form-label { font-weight: 600; font-size: 0.9rem; color: #555; }

        /* Pagination active state */
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .pagination .page-link {
            color: #050709;
        }
        .pagination .page-link:focus {
            box-shadow: 0 0 0 0.25rem rgba(212, 167, 98, 0.25);
        }

        /* Dropdown menu */
        .dropdown-item:active {
            background-color: var(--primary-color);
        }

        /* Form focus states */
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(212, 167, 98, 0.25);
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Image preview */
        .img-preview { max-width: 200px; max-height: 150px; border-radius: 8px; object-fit: cover; }

        /* Action buttons group */
        .action-group { display: flex; gap: 0.25rem; }
        .action-group .btn { padding: 0.25rem 0.5rem; font-size: 0.8rem; }
    </style>
    @yield('extra_styles')
</head>
<body>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-flash" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-flash" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('img/logo.webp') }}" alt="Golden Memories Safaris Admin" loading="lazy">
            <span>GM Safaris Admin</span>
        </div>
        <div class="sidebar-menu">
            <div class="menu-label">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>

            <div class="menu-label">Content</div>
            <a href="{{ route('admin.safaris.index') }}" class="{{ request()->routeIs('admin.safaris.*') ? 'active' : '' }}">
                <i class="fas fa-paw"></i> Safaris
            </a>
            <a href="{{ route('admin.destinations.index') }}" class="{{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                <i class="fas fa-map-marker-alt"></i> Destinations
            </a>
            <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <i class="fas fa-blog"></i> Blog Posts
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Gallery
            </a>

            <div class="menu-label">Management</div>
            <a href="{{ route('admin.join-safaris.index') }}" class="{{ request()->routeIs('admin.join-safaris.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Join Safaris
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Bookings
                @php $pendingCount = \App\Models\Booking::pending()->count(); @endphp
                @if($pendingCount > 0)
                    <span class="badge bg-warning text-dark">{{ $pendingCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                <i class="fas fa-question-circle"></i> Inquiries
                @php $inquiryCount = \App\Models\Inquiry::unread()->count(); @endphp
                @if($inquiryCount > 0)
                    <span class="badge bg-info">{{ $inquiryCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Messages
                @php $unreadCount = \App\Models\ContactMessage::unread()->count(); @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-danger">{{ $unreadCount }}</span>
                @endif
            </a>

            <div class="menu-label">Account</div>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="fas fa-bars"></i>
                </button>
                <h5>@yield('page_title', 'Dashboard')</h5>
            </div>
            <div class="topbar-right">
                <div class="user-info">
                    <strong>{{ Auth::guard('admin')->user()->name }}</strong>
                    <small>Administrator</small>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm rounded-circle" data-bs-toggle="dropdown">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-hide flash messages
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.alert-flash').forEach(function(el) {
                    var bsAlert = new bootstrap.Alert(el);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
    @yield('extra_scripts')
</body>
</html>
