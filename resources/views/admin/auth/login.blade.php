<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #050709 0%, #1a1c1f 50%, #2a2d31 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Open Sans', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            border: 1px solid rgba(212, 167, 98, 0.2);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-logo img { max-height: 50px; margin-bottom: 0.5rem; }
        .login-logo h4 { font-weight: 600; color: #050709; }
        .login-logo p { color: #888; font-size: 0.85rem; margin: 0; }
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            border-color: #D4A762;
            box-shadow: 0 0 0 0.25rem rgba(212, 167, 98, 0.25);
        }
        .btn-login {
            background: #D4A762;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            width: 100%;
            transition: background 0.2s;
        }
        .btn-login:hover { background: #B8924A; color: #fff; }
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #888;
        }
        .input-group .form-control { border-left: none; border-radius: 0 10px 10px 0; }
        .input-group:focus-within .input-group-text { border-color: #D4A762; }
        .error-feedback { color: #dc3545; font-size: 0.8rem; margin-top: 0.25rem; }
        .back-link { text-align: center; margin-top: 1.5rem; }
        .back-link a { color: #888; text-decoration: none; font-size: 0.85rem; }
        .back-link a:hover { color: #D4A762; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('img/logo.webp') }}" alt="GM Safaris">
            <h4>Admin Login</h4>
            <p>Golden Memories Safaris CMS</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2">
                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold small">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autofocus placeholder="admin@gmsafaris.co.tz">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           required placeholder="Enter your password">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label small" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Sign In
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}"><i class="fas fa-arrow-left me-1"></i> Back to Website</a>
        </div>
    </div>
</body>
</html>
