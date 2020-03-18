<?php

namespace Yevhenii\Seo\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model {

    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'seos';

    public static $requiredField = ['id'];

    /**
     * get seo by slug page, if doesn't exists get seo for main page
     *
     * @param $slug
     *
     * @return mixed
     */
    public static function getBySlug($slug)
    {
        return self::where('slug_page', $slug)->first();
    }
}
