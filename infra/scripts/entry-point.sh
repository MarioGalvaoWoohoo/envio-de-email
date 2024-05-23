#!/usr/bin/env bash
set -e

# Cria o schema do banco de dados.
php artisan migrate --force

exec "$@"