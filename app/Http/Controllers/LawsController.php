<?php

namespace App\Http\Controllers;

use App\Banner;

class LawsController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','4');
        return view('laws.index')->withBanner($banner);
    }
}
