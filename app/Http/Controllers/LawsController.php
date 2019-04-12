<?php

namespace App\Http\Controllers;

use App\Banner;
use App\CategoriesRelatedLaw;
use App\RelatedLaw;
use App\Logo;

class LawsController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','4');
        $catelaws = CategoriesRelatedLaw::all();
        $laws = RelatedLaw::all();
        $logo = Logo::first();
        return view('laws.index')->withBanner($banner)->withCatelaws($catelaws)->withLawscontent($laws)->withLogo($logo);
    }
}
