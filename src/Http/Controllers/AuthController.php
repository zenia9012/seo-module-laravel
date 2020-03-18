<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    /**
     * show login form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLogin()
    {
        return view('seo::admin.login');
    }

    /**
     * login to admin seo
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        if ($request->email == env('SEO_ADMIN_LOGIN') &&
            $request->password == env('SEO_ADMIN_PASSWORD')) {

            $request->session()->regenerate();

            session(['auth' => Hash::make($request->password)]);

            return redirect()->to(route('seo.admin.seo'));
        }

        return back()->withErrors(__('auth.failed'));
    }

    /**
     * logout from seo admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        session()->forget('auth');

        return redirect()->to(route('seo-login'));
    }
}
