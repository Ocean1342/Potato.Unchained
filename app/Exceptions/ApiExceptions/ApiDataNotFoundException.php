<?php

namespace App\Exceptions\ApiExceptions;

use Exception;

class ApiDataNotFoundException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json(['message' => $this->message], 404);
    }
}
