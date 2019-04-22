# Install Laravel Passport (PHP Only)

- Install a clean [Laravel](https://github.com/Divinityfound/howtos/tree/master/laravel_install) instance.
- Install the basic authentication for Laravel and Laravel Passport

```
composer require laravel/passport
php artisan make:auth
php artisan migrate
php artisan passport:install
```

- Add the Larave\Passport\HasApiTokens trait to App\User model.
