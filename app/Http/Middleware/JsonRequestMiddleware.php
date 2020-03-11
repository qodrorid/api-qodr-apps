<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->getContentType() === 'json') {
            $data = $request->json()->all();
            $request->request->replace(is_array($data) ? $data : []);
            return $next($request);
        } else {
            abort(400, "Content Type must json");
        }
    }
}