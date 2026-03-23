# Libros

Tarea 1 — Catálogo de libros, autores y editoriales (Laravel + Blade).

## Requisitos

- PHP 8.4+
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

El contenedor arranca con `php -S` (servidor embebido de PHP) sirviendo `public/`, usando el puerto que define Render (`PORT`). No se ejecuta `php artisan` en el build (evita fallos en la imagen); `APP_KEY` debe existir como variable de entorno en Render.

En el repositorio, `.env.example` usa `SESSION_DRIVER=file`, `CACHE_STORE=file` y `QUEUE_CONNECTION=sync` para que Artisan y el despliegue no dependan de tablas en base de datos (esta tarea no usa BD).
