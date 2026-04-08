#!/bin/sh
set -e
if [ -z "${APP_KEY}" ]; then
  echo "ERROR: APP_KEY must be set in the host environment (e.g. Render → Environment)." >&2
  exit 1
fi
cd /var/www/html
# Ensure SQLite file exists (Render / Docker).
if [ -n "${DB_DATABASE}" ]; then
  mkdir -p "$(dirname "${DB_DATABASE}")"
  touch "${DB_DATABASE}"
else
  mkdir -p database
  touch database/database.sqlite
fi
php artisan migrate --force --no-interaction
exec php -S "0.0.0.0:${PORT:-8080}" -t public public/index.php
