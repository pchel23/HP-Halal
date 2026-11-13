<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SaveBackUrl
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('get')) {
            $previous = url()->previous();
            $current = url()->current();

            if ($previous && $previous !== $current) {
                session(['admin_back_url' => $previous]);
            }
        }

        return $next($request);
    }
}
