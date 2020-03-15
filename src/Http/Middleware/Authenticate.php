<?php

namespace Yevhenii\Seo\Http\Middleware;

use Closure;

class Authenticate {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('auth') != 1) {
            return redirect()->to(route('seo-login'));
        }

        return $next($request);
    }
}
