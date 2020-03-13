<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index(Request $request)
    {
        return view('seo::admin.main');
    }
}
