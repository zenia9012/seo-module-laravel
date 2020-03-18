<?php

namespace Yevhenii\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Yevhenii\Seo\Models\Seo;

class SeoAdminController extends Controller {

    /**
     * show all pages
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $columns = config('seo.show_columns') ;
        $pages = Seo::all(array_merge(Seo::$requiredField, $columns));

        return view('seo::admin.seo.index', compact(['pages', 'columns']));
    }

    /**
     * delete pages
     *
     * @param Seo $seo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Seo $seo)
    {
        $seo->delete();

        return back();
    }
}
