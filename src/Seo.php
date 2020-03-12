<?php

namespace Yevhenii\Seo;

class Seo {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function seoBlock()
    {
        return view('seo::seo');
    }
}
