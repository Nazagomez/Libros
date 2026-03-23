#!/bin/sh
set -e
if [ -z "${APP_KEY}" ]; then
  echo "ERROR: APP_KEY must be set in the host environment (e.g. Render → Environment)." >&2
  exit 1
fi
exec php -S "0.0.0.0:${PORT:-8080}" -t public public/index.php
