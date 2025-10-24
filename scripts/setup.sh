#!/usr/bin/env bash
set -e
echo "Support Tracker setup script - requires composer and npm installed."

if ! command -v composer >/dev/null 2>&1; then
  echo "Composer not found. Install Composer: https://getcomposer.org/download/"
  exit 1
fi

composer install

cp .env.example .env || true
php artisan key:generate

php artisan migrate --seed

if ! command -v npm >/dev/null 2>&1; then
  echo "npm not found. Install Node.js + npm."
  exit 1
fi

npm ci
npm run build

echo "Setup complete. Run 'php artisan serve' or use Docker Compose."
