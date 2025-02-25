Здравствуйте)

1. Создать .env файл
2 .Создать файл database.sqlite в папке database
3. В DB_CONNECTION указать sqlite
4. Удалить DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME,DB_PASSWORD
5. composer install
6. php artisan key:generate
5. Выполнить миграции php artisan migrate --seed
6. запустить серв
