# Libros

Tarea 1 — Catálogo de libros, autores y editoriales (Laravel + Blade).

## Requisitos

- PHP 8.2+
- [Composer](https://getcomposer.org/)

## Instalación local

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Abre `http://127.0.0.1:8000`.

## Deploy en Render (Docker)

1. En el servicio, elige **Environment: Docker** (Render usa el `Dockerfile` de la raíz).
2. Variables de entorno en el panel de Render (mínimo):

| Variable | Valor |
|----------|--------|
| `APP_KEY` | Genera con `php artisan key:generate --show` en tu PC y pega el valor `base64:...` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | La URL que te da Render (ej. `https://tu-app.onrender.com`) |

El contenedor arranca con `php artisan serve` en el puerto que define Render (`PORT`).
