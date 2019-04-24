<?php

use Illuminate\Http\Request;

// POST yourUrl.com/api/apiEndpointName
Route::post('apiEndpointName', 'ApiEndpointController@apiEndpointName');

Route::prefix('prefix')->group(function() {
	// POST yourUrl.com/api/prefix/apiEndpointName
	Route::post('apiEndpointName'          , 'ApiEndpointController@apiEndpointName');
	// POST yourUrl.com/api/prefix/apiEndpointNameTwo/slug
	Route::post('apiEndpointNameTwo/{slug}', 'ApiEndpointController@apiEndpointNameTwo');
	// POST yourUrl.com/api/prefix/authorizationMethod Authorization: Bearer YourAuthorizationKey
	Route::post('authorizationMethod'      , 'ApiEndpointController@authorizationMethod');
});