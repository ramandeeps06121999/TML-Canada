# TML Agency — Core PHP site

This directory is a Core PHP front-end that mirrors the Next.js app’s routes, Tailwind styling, and JSON-backed content. The Next project remains the source of truth for data; run the export script after content changes.

## Setup

1. **Export data from TypeScript** (generates `data/*.json`, including ~11MB of location-service enrichments):

   ```bash
   npm run export-php-data
   ```

2. **Build CSS** (same Tailwind source as Next):

   ```bash
   npm run build:php-css
   ```

3. **Static files** are copied from the repo `public/` folder into `php-site/public/`. Re-copy after asset changes:

   ```bash
   cp -R public/* php-site/public/
   ```

## Local development

From the repo root:

```bash
npm run php:dev
```

Then open `http://127.0.0.1:8080`. This uses `public/router.php` so clean URLs work (the PHP built-in server does not read `.htaccess`).

## Production (Apache)

Point the virtual host document root at `php-site/public`. Ensure `mod_rewrite` is enabled so `public/.htaccess` routes all requests to `index.php`.

## Production (nginx)

Use `try_files $uri $uri/ /index.php?$query_string;` with PHP-FPM, with `index.php` as the front controller.

## Implemented routes

- `/` — Home (hero + logos + services grid; below-the-fold React sections are simplified compared to Next).
- `/services` — Services index.
- `/services/{slug}` — Main service pages (e.g. `seo`, `branding`).
- `/services/{service-in-city}` — Location pages (e.g. `seo-in-chandigarh`), driven by exported enrichments.
- `/blog` — Blog index.
- `/blog/{slug}` — Blog article (HTML body from JSON).

Other Next routes (`/about`, `/contact`, `/industries`, `/portfolio`, case studies, locations, free tools, Chandigarh landing, etc.) are not ported yet and return 404 unless you add PHP views and wire them in `public/index.php`.

## Environment

- PHP 8.1+ recommended (`declare(strict_types=1)` throughout).
- JSON is cached in memory per request; `memory_limit` is raised to 256M in `bootstrap.php` for large `enrichments.json`.
