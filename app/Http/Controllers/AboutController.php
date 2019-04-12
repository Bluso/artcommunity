<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AboutMember;
use App\AboutHistory;
use App\Banner;
use App\Logo;

class AboutController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','2');
        $member = AboutMember::all();
        $history = AboutHistory::first();
        $logo = Logo::first();
        return view('about.index')->withMember($member)->withHistory($history)->withBanner($banner)->withLogo($logo);
    }
}
