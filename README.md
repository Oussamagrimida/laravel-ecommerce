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

## Screenshots 📸
Below are a few screenshots from the application UI. The full set is in the `screenshots/` folder.

<p align="center">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011257.png" width="320" alt="Home page">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011312.png" width="320" alt="Product list">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011321.png" width="320" alt="Product details">
</p>

<p align="center">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011345.png" width="320" alt="Cart">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011357.png" width="320" alt="Checkout">
  <img src="screenshots/Capture%20d%27%C3%A9cran%202026-02-01%20011410.png" width="320" alt="Admin view">
</p>

> Note: If the images do not display immediately on GitHub, make sure the repository is published and pushed; images will show on the repo home page once the files are in the `main` branch.

