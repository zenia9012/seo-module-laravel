<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Yevhenii\Seo\Models\Seo;

class AdminController extends Controller {

    public function index(Request $request)
    {
        $columns = config('seo.show_columns');
        $pages = Seo::all($columns);

        return view('seo::admin.main', compact(['pages', 'columns']));
    }
}
