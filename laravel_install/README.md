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
- Update your [.env](https://github.com/Divinityfound/howtos/blob/master/laravel_install/.env) variables to connect to the database.
- Migrate your databases to verify that the variables are correct.

```
php artisan migrate
```

- Configure your host (or vhost) to point to your public directory
- Your laravel instance is good to go!


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|