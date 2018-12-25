<?php

namespace Yevhenii\Seo\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public static function seoBlock(  ) {
		return view('seo::seo');
    }

	/**
	 * get seo by slug page, if doesn't exists get seo for main page
	 * @param $slug
	 *
	 * @return mixed
	 */
	public static function slug( $slug ) {

		$seo = self::where('slug_page', $slug)->first();

		if ($seo == null){
			$seo = self::where('slug_page', '/')->first();
		}
		return $seo;
	}
}
