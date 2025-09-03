#!/bin/sh

# wait until MySQL is ready
echo "Waiting for MySQL..."
until nc -z -v -w30 $DB_HOST $DB_PORT
do
  echo "Waiting for database connection..."
  sleep 2
done

echo "MySQL is up - executing command"
exec "$@"
