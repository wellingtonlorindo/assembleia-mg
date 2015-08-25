#!/bin/bash

cat assembleia/storage/databases/assembleia.sql | sqlite3 assembleia/storage/databases/assembleia.db

cd assembleia

cp .env.example .env

composer install --prefer-dist

php artisan key:generate

php artisan migrate

composer dump-autoload

php artisan db:seed