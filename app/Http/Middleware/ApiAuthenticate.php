<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;


class ApiAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request): HttpResponseException
    {
        throw new HttpResponseException(response()->json([
            'message' => 'not authorized. Please visit http://potato.test/login to get auth token'
        ], 401));
    }
}
