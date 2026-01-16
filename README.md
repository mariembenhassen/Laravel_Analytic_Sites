# Laravel Analytics Project

This project is a real‑time analytics dashboard built with **Laravel**, **Livewire + Volt**, **Laravel Reverb**, and **Livewire Charts**.

---

##  Installation & Setup

### 1. Clone & Install Dependencies
```bash
git clone https://github.com/your-repo/laravel-analytics.git
cd laravel-analytics

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install
```

### 2. Environment Setup
Copy `.env.example` to `.env` and configure your database, broadcasting, and app keys:
```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your DB credentials.

---

##  Development Servers

Run these in separate terminals:

```bash
# Laravel backend
php artisan serve

# Vite frontend (assets, hot reload)
npm run dev
```

---

##  Broadcasting with Laravel Reverb

Install and start Reverb for real‑time events:

```bash
# Install broadcasting with Reverb
php artisan install:broadcasting --reverb
# (choose "yes" when asked to install frontend dependencies)

# Start Reverb server
php artisan reverb:start
```

---

##  Extra Composer Packages

### Livewire Volt
```bash
composer require livewire/volt
```

### Livewire Charts
```bash
composer require asantibanez/livewire-charts
```

---

##  Quick Start

1. Run migrations:
   ```bash
   php artisan migrate
   ```

2. Create your first Volt component:
   ```bash
   php artisan volt:make Dashboard
   ```

3. Add a chart to your component using `livewire-charts`.

4. Visit your app at:
   ```
   http://localhost:8000
   ```

---

## Features
-  Real‑time analytics with Laravel Reverb  
-  Reactive UI with Livewire + Volt  
-  Interactive charts powered by Livewire Charts  
-  Secure multi‑user site tracking  
