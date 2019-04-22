# Install Laravel Passport (PHP Only)

- Install a clean [Laravel](https://github.com/Divinityfound/howtos/tree/master/laravel_install) instance.
- Install the basic authentication for Laravel and Laravel Passport

```
composer require laravel/passport
php artisan make:auth
php artisan migrate
php artisan passport:install
```

- Add the Larave\Passport\HasApiTokens trait to [app/User.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/User.php) model.
- Add Passport::routes within boot method of the [app/Providers/AuthServiceProvider.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/AuthServiceProvider.php)
- Set the driver option of the api authentication guard to passport.
- Create the controller for handling API requests.

```sh
php artisan make:controller Api/AuthController
```

- Add the following to the top of [/app/Http/Controllers/Api/AuthController.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/AuthController.php)

```php
use App\User;
use Illuminate\Support\Facades\Validator;
use Hash;
```

- Create the following three functions within [/app/Http/Controllers/Api/AuthController.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/AuthController.php)

```php
public function register (Request $request) {

    $validator = Validator::make($request->all(), [
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    if ($validator->fails())
    {
        return response(['errors'=>$validator->errors()->all()], 422);
    }
    $request['password']=Hash::make($request['password']);
    $user = User::create($request->toArray());
    $token = $user->createToken('Laravel Password Grant Client')->accessToken;
    $response = ['token' => $token];
    return response($response, 200);
}

public function login (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = "Password missmatch";
            return response($response, 422);
        }
    } else {
        $response = 'User does not exist';
        return response($response, 422);
    }
}

public function logout (Request $request) {
    $token = $request->user()->token();
    $token->revoke();
    $response = 'You have been succesfully logged out!';
    return response($response, 200);

}
```

- Create a middleware to force JSON responses.

```sh
php artisan make:middleware ForceJsonResponse
```

- Change your [app/Http/Middleware/ForceJsonResponse.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/ForceJsonResponse.php) into this.

```php
<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
```

- Add to $routeMiddleware of the [app/Http/Kernel.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/Kernel.php) file this.

```php
'json.response' => \App\Http\Middleware\ForceJsonResponse::class,
```

- Add to [routes/api.php](https://github.com/Divinityfound/howtos/blob/master/laravel_passport/api.php) the following routes:

```php
Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    // public routes
    Route::post('/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    });

});
```

- And now you should be able to test your passport code with [postman](https://www.getpostman.com/).
- Disclaimer: This was done with Laravel 5.8. Things may change in the future that may alter the approach slightly.


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|