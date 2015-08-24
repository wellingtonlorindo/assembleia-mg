#!/bin/bash

cat assembleia/storage/databases/assembleia.sql | sqlite3 assembleia/storage/databases/assembleia.db

cd assembleia

php artisan migrate

composer dump-autoload

php artisan db:seed