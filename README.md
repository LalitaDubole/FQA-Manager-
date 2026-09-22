# FAQ Manager

A simple CRUD-based FAQ management system built with Laravel, developed as a case study project for MCA.

## Features

- **Category Management** — Create, edit, and delete FAQ categories with custom display order.
- **FAQ Management** — Add, edit, and delete FAQs, each linked to a category.
- **Ordering** — Control the display sequence of FAQs within each category.
- **Publish/Unpublish** — Toggle visibility of FAQs on the public page without deleting them.
- **Public Support Page** — Clean, accordion-style FAQ page showing only published entries, grouped by category.

## Tech Stack

- Laravel 10
- MySQL
- Blade templates
- Bootstrap 5

## Pages

| Route | Description |
|---|---|
| `/` | Redirects to public FAQ page |
| `/faqs` | Public-facing FAQ page (published entries only) |
| `/admin/categories` | Manage FAQ categories |
| `/admin/faqs` | Manage FAQs (create, edit, delete, publish/unpublish) |

## Setup Instructions

1. Clone the repository
```bash
   git clone https://github.com/LalitaDubole/FQA-Manager-.git
   cd FQA-Manager-
```

2. Install dependencies
```bash
   composer install
```

3. Copy `.env.example` to `.env` and set your database credentials
```bash
   cp .env.example .env
```

4. Generate application key
```bash
   php artisan key:generate
```

5. Run migrations
```bash
   php artisan migrate
```

6. Start the server
```bash
   php artisan serve
```

7. Visit `http://127.0.0.1:8000` in your browser

## Project Structure

- `app/Models` — Eloquent models (`Faq`, `FaqCategory`)
- `app/Http/Controllers/Admin` — Admin CRUD controllers
- `app/Http/Controllers/FaqPublicController.php` — Public page controller
- `resources/views/admin` — Admin panel views
- `resources/views/public` — Public FAQ page view
- `database/migrations` — Database schema