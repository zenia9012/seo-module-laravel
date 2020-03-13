<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {

    public function login()
    {
        return view('seo::admin.main');
    }
}
