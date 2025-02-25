Здравствуйте)

1. Создать .env файл
2. В DB_CONNECTION указать sqlite
3. Удалить DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME,DB_PASSWORD
4. composer install
5. php artisan key:generate
5. Выполнить миграции php artisan migrate --seed
6. запустить серв
