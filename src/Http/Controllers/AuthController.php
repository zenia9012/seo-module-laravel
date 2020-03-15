<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller {

    public function showLogin()
    {
        return view('seo::admin.login');
    }

    public function login(Request $request)
    {
        if ($request->email == env('SEO_ADMIN_LOGIN') &&
            $request->password == env('SEO_ADMIN_PASSWORD')) {

            $request->session()->regenerate();

            session(['auth' => Hash::make($request->password)]);

            return redirect()->to(route('seo.admin.index'));
        }

        return back()->withErrors(__('auth.failed'));
    }
}
