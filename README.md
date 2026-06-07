# BaseCMS Starter Kit

A reusable Laravel 13 Blade-only base project for content-driven websites, blogs, dashboards, company profiles, portals, portfolios, service websites, and internal admin systems.

## Stack

- Laravel 13.14
- Blade-only views with Blade components
- Tailwind CSS 4 through Vite
- Alpine.js for theme toggle, toasts, mobile navigation, and reveal effects
- SQLite local default
- PHPUnit feature tests

## Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
composer run dev
```

Open the app at `http://localhost:8000`.

## Demo Accounts

All seeded demo accounts use the password `password`.

| Role | Email | Access |
| --- | --- | --- |
| Superadmin | `superadmin@example.com` | Full CMS and user management |
| Admin | `admin@example.com` | CMS dashboard, posts, categories, and tags |
| User | `user@example.com` | User dashboard and own profile |

## Route Summary

- Public: `/`, `/blog`, `/blog/{post}`, `/categories/{category}`, `/tags/{tag}`, `/about`, `/contact`, `/terms`, `/privacy`
- Auth: `/login`, `/register`, `/forgot-password`, `/reset-password/{token}`, `/logout`
- User: `/dashboard`, `/profile`, `/profile/edit`, `/profile/password`
- Admin: `/admin`, `/admin/posts`, `/admin/categories`, `/admin/tags`
- Superadmin: `/superadmin/users`

## Role Permission Matrix

| Capability | User | Admin | Superadmin |
| --- | --- | --- | --- |
| Read public content | Yes | Yes | Yes |
| Manage own profile | Yes | Yes | Yes |
| Access user dashboard | Yes | Yes | Yes |
| Access admin dashboard | No | Yes | Yes |
| Manage posts/categories/tags | No | Yes | Yes |
| Access user management | No | No | Yes |
| Create/edit/delete users | No | No | Yes |
| Change user roles | No | No | Yes |
| Delete own superadmin account from user management | No | No | Prevented |

## Architecture Notes

- Middleware aliases are registered in `bootstrap/app.php`.
- Authorization is enforced with policies and controller `authorize()` calls, not only Blade visibility checks.
- Role values live in `App\Enums\UserRole`.
- Post status values live in `App\Enums\PostStatus`.
- Toast notifications use one reusable Blade component and session flash data.
- Dark mode persists in `localStorage` and respects the system preference when no user choice exists.
- Blog, auth, dashboard, and CRUD UIs are built with reusable Blade components.

## Testing

```bash
php artisan test
```

Latest result:

```text
Tests: 7 passed
Assertions: 44 passed
```

## Useful Commands

```bash
php artisan migrate:fresh --seed
php artisan route:list --except-vendor
npm run build
composer run dev
```

## Limitations and Recommended Next Improvements

- Password reset is wired to Laravel's password broker; configure real mail delivery before production.
- Featured images currently accept URL strings and use gradient placeholders in the UI.
- Contact page is static and ready for a future form.
- Add file uploads/media library only when a target project needs it.
- Add email verification and audit logs if the starter is used for regulated admin workflows.

