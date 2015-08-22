#!/bin/bash

cat assembleia/storage/databases/assembleia.sql | sqlite3 assembleia/storage/databases/assembleia.db

cd assembleia

composer dump-autoload

php artisan db:seed