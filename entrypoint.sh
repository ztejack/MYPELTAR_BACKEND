#!/bin/sh

until nc -z -v -w30 db 3306; do
  echo "waiting MySQL..."
  sleep 5
done

php artisan migrate:fresh --seed

exec "$@"
