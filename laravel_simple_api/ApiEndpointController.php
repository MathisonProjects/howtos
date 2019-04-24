<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiEndpointController extends Controller
{
    public function apiEndpointName(Request $request) {
    	return 'Hello, World!';
    }

    public function apiEndpointNameTwo(Request $request, $slug) {
    	$array = [
    		'request' => $request->input(),
    		'slug'    => $slug
    	];

    	return $array;
    }

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
}
