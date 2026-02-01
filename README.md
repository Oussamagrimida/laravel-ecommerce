# Laravel E-Commerce Store 🛒

**A simple e-commerce web application built with Laravel** — browse products, view details, add items to cart, checkout, and manage products & categories from an admin panel.

---

## Project summary ✨
- **Title:** Laravel E‑Commerce Store
- **Repository name:** `laravel-ecommerce`
- **Stack:** PHP 8.2, Laravel 12, MySQL/SQLite, Node.js, Vite


## Features ✅
- Public product listing and product detail pages
- Cart management: add to cart, view cart, remove items
- Checkout and order confirmation
- Admin area to add / update / delete categories and products
- Authentication and user profile management
- Database migrations and seeders for easy setup


## Quick start 🔧
1. Clone the repository:
   ```bash
   git clone https://github.com/<your-username>/laravel-ecommerce.git
   cd laravel-ecommerce
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Environment setup:
   ```bash
   cp .env.example .env
   # edit .env to set DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD
   php artisan key:generate
   ```
4. Run migrations (and seeders if available):
   ```bash
   php artisan migrate --seed
   ```
5. Frontend build:
   ```bash
   npm install
   npm run dev
   ```
6. Serve the app locally:
   ```bash
   php artisan serve
   ```


## Testing 🧪
Run tests with:
```bash
php artisan test
# or
./vendor/bin/pest
```


---

## Admin dashboard — large screenshot 📸
A clear view of the admin dashboard (click to open full size).

<p align="center">
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011410.png">
    <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011410.png" alt="Admin dashboard" style="max-width:1200px; width:100%; height:auto; border:1px solid #ddd; border-radius:6px;">
  </a>
</p>

---

## Project screenshots gallery
Below are additional screenshots from the application UI — click any image to view full size.

<p align="center">
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011257.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011257.png" width="640" alt="Home page" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011312.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011312.png" width="640" alt="Product list" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011321.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011321.png" width="640" alt="Product details" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
</p>

<p align="center">
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011345.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011345.png" width="640" alt="Cart" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011357.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011357.png" width="640" alt="Checkout" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011433.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011433.png" width="640" alt="Orders table" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
</p>

<p align="center">
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011445.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011445.png" width="640" alt="Add product" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
  <a href="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011514.png"><img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011514.png" width="640" alt="Settings" style="margin:8px; border:1px solid #ddd; border-radius:6px;"/></a>
</p>





