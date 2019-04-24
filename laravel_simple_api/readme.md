# How to use Laravel APIs and Authorization

## Programs
- Postman

## Commands
```sh
php artisan make:controller ApiEndpointController
```

## Files
- routes/api.php
- app/Http/Controllers/ApiEndpointController.php


### Simple API
- Run the following command.

```sh
php artisan make:controller ApiEndpointController
```

- Open your file routes/api.php.
- Add the following route to your file.

```php
// POST yourUrl.com/api/apiEndpointName
Route::post('apiEndpointName', 'ApiEndpointController@apiEndpointName');
```

- Open your file app/Http/Controllers/ApiEndpointController.php
- Add the following method to your file.

```php
    public function apiEndpointName(Request $request) {
    	return 'Hello, World!';
    }
```

- On postman, enter in your page's URL with the following:
```
/api/apiEndpointName
```
- Ensure that it is going to POST, not GET.
- Click send, and you will receive the response "Hello, World!"

### Prefixed API
- Open your file routes/api.php.
- Add the following prefix and route to your file.

```php
// Adds the prefix "prefix" to your routes
Route::prefix('prefix')->group(function() {
	// POST yourUrl.com/api/prefix/apiEndpointName
	Route::post('apiEndpointName'          , 'ApiEndpointController@apiEndpointName');
});
```

- On postman, enter in your page's URL with the following:
```
/api/prefix/apiEndpointName
```
- Ensure that it is going to POST, not GET.
- Click send, and you will receive the response "Hello, World!"

### API with Variables
- Open your file routes/api.php.
- Add the following route to your file inside of the prefix group.

```php
	// POST yourUrl.com/api/prefix/apiEndpointNameTwo/slug
	Route::post('apiEndpointNameTwo/{slug}', 'ApiEndpointController@apiEndpointNameTwo');
```

- Open your file app/Http/Controllers/ApiEndpointController.php
- Add the following method to your file.

```php
	public function apiEndpointNameTwo(Request $request, $slug) {
    	$array = [
    		'request' => $request->input(),
    		'slug'    => $slug
    	];

    	return $array;
    }
```

- On postman, enter in your page's URL with the following:
```
/api/prefix/apiEndpointName/SlugValue
```
- Under "Body", add the following keys and value pairs.
```
	key1 : value1
	key2 : value2
	key3 : value3
```

- Ensure that it is going to POST, not GET.
- Click send, and you will receive the response

```json
{ "request" : { "key1" : "value1", "key2" : "value2", "key3" : "value3" }, "slug" : "SlugValue"}
```


### API Authorization

- Open your file routes/api.php.
- Add the following route to your file inside of the prefix group.

```php
	// POST yourUrl.com/api/prefix/authorizationMethod Authorization: Bearer YourAuthorizationKey
	Route::post('authorizationMethod'      , 'ApiEndpointController@authorizationMethod');
```

- Open your file app/Http/Controllers/ApiEndpointController.php
- Add the following method to your file.

```php
	public function authorizationMethod(Request $request) {
    	$array = [
    		'auth'    => $request->header('Authorization'),
    		'request' => $request->input()
    	];

    	if ($request->header('Authorization') != 'Bearer YourAuthorizationKey') {
    		return response('Unauthorized Access', 404);
    	} else {
    		return $array;
    	}
    }
```

- On postman, enter in your page's URL with the following:
```
/api/prefix/authorizationMethod
```
- Under "Body", add the following keys and value pairs.
```
	key1 : value1
	key2 : value2
	key3 : value3
```
- Under "Authorization", in the dropdown select Bearer Token
- Add into Token "YourAuthorizationKey"
- Ensure that it is going to POST, not GET.
- Click send, and you will receive the response

```json
{ "auth": "YourAuthorizationKey", "request" : { "key1" : "value1", "key2" : "value2", "key3" : "value3" }}
```

- You will receive a 404 error of "Unauthorized Access" if the token is not inserted correctly.

- Disclaimer: There will often be issues if you try to communicate from one site to another, and often will throw a CORS error at you. That target site will need to change it's CORS policy in order for you to gain access. If others have issues connecting to your API due to this, you need to update your CORS policy.
- Happy Coding!!!


### If you feel this guide was helpful...

Please give me a follow or subscribe in the following:

|Twitter|Github|Youtube|Twitch|Linkedin|Personal Site|
| ----- | ---- | ----- | ---- | ------ | ----------- |
|[MathisonProject](https://twitter.com/MathisonProject)|[Divinityfound](https://github.com/Divinityfound)|[Jacob Mathison](https://www.youtube.com/channel/UCNNxB1TRbdJxE_y51sJb9DA)|[MathisonProjects](http://twitch.tv/mathisonprojects)|[Jacob Mathison](https://www.linkedin.com/in/jacob-mathison-62359912/)|[Mathison Projects](http://mathisonprojects.com)|