# Install Laravel

- Install Clean Laravel Instance

```
git clone https://github.com/laravel/laravel.git LARAVEL_DIR/
cd LARAVEL_DIR/
chmod -R 755 ./.
chmod -R 777 ./bootstrap
chmod -R 777 ./storage
composer install
php artisan key:generate

```
- Update .env.example to .env
- Create a DB Instance for Laravel
- Update your [.env]() variables to connect to the database.
- Migrate your databases to verify that the variables are correct.

```
php artisan migrate
```

- Configure your host (or vhost) to point to your public directory
- Your laravel instance is good to go!