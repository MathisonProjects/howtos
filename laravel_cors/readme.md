# Laravel CORS

## Files
- [config/app.php]()
- [app/Http/Kernel.php]()
- [config/cors.php]()

## Guide

In order to access laravel via an API on another domain, you need to enable your site to accept these connections.

You can add a range of accepted connections, but we will focus today on just opening it up.

- You need to import a package via composer for [CORS](https://github.com/barryvdh/laravel-cors). You may refer to the source there, or remain here for a rehash on verbiage.

```sh
composer require barryvdh/laravel-cors
php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"
```

Depending on your laravel version, you may need to modify each file with the following:
- [config/app.php](https://github.com/Divinityfound/howtos/blob/master/laravel_cors/app.php)
```php
	'providers' => [
		// ...
		Barryvdh\Cors\ServiceProvider::class,
	]
```

- [app/Http/Kernel.php](https://github.com/Divinityfound/howtos/blob/master/laravel_cors/laravel_cors.php)
```php
protected $middleware = [
    // ...
    \Barryvdh\Cors\HandleCors::class,
];

protected $middlewareGroups = [
    'web' => [
       // ...
    ],

    'api' => [
        // ...
        \Barryvdh\Cors\HandleCors::class,
    ],
];
```

Once it is saved, you may start tagging an API on the application's domain, similar to if you were trying to tag it locally.


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|