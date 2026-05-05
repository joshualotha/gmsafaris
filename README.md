# Gmsafaris Laravel Project

A Laravel conversion of the Golden Memories Safaris website - a Tanzania tour operator website.

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite (for database, included) or MySQL/PostgreSQL

## Installation

1. Navigate to the project directory:
   ```bash
   cd gmsafaris-laravel
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Generate application key:
   ```bash
   php artisan key:generate
   ```

4. Run the development server:
   ```bash
   php artisan serve
   ```

5. Visit `http://localhost:8000` in your browser

## Project Structure

```
├── app/
│   ├── Console/          # Console commands
│   ├── Exceptions/       # Exception handling
│   ├── Http/
│   │   ├── Controllers/ # (optional, using route views)
│   │   ��── Middleware/   # HTTP middleware
│   └── Providers/        # Service providers
├── bootstrap/           # Laravel bootstrap files
├── config/              # Configuration files
├── database/            # Database files (SQLite included)
├── public/              # Public assets
│   ├── css/            # Stylesheets
│   ├── img/            # Images
│   ├── js/             # JavaScript
│   └── lib/             # Library files
├── resources/
│   └── views/           # Blade templates
│       ├── layouts/     # Master layout
│       └── *.blade.php  # Page templates
└── routes/
    └── web.php          # Web routes
```

## Features

- **Exactly matches original HTML/CSS implementation** - All styles preserved
- **56 Blade templates** - Covering all pages
- **SEO optimized** - All meta tags, Open Graph, Twitter cards maintained
- **Asset management** - CSS, JS, images properly organized
- **Google Analytics** - Integrated tracking
- **Google Translate widget** - Multilingual support
- **Tawk.to live chat** - Integrated

## Pages Included

All original pages have been converted:
- Home page with hero carousel
- About, Safaris, Destinations, Gallery, Contact
- Booking and inquiry forms
- Blog and testimonials
- Safari packages (multiple pages)
- National parks and destinations
- Information pages (visa, health, customs, etc.)

## Customization

### Environment Configuration

Copy `.env.example` to `.env` and configure:
- `APP_URL` - Your site URL
- `MAIL_*` - Email configuration
- Database settings if using MySQL/PostgreSQL

### Assets

Assets are located in `public/`:
- `public/css/` - All stylesheets
- `public/js/` - JavaScript files
- `public/img/` - Images
- `public/lib/` - Library files (WOW, Owl Carousel, etc.)

## Running in Production

1. Optimize for production:
   ```bash
   php artisan optimize
   ```

2. Set proper permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

3. Configure your web server (Apache/Nginx) to point to `public/`

## Notes

- The LSP errors shown during development are normal and will resolve after running `composer install`
- All CSS inline styles from original HTML files have been preserved
- External CDN links (Font Awesome, Google Fonts, etc.) remain unchanged