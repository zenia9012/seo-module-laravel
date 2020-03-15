<?php

namespace Yevhenii\Seo\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

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
        if (!session()->has('auth')) {
            return redirect()->to(route('seo-login'));
        }

        $password = env('SEO_ADMIN_PASSWORD');

        if (!Hash::check($password, session()->get('auth'))) {
            return redirect()->to(route('seo-login'));
        }

        return $next($request);
    }
}
