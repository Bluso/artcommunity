<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBanner;

class BannerController extends Controller
{
   
    public function index()
    {
        $banner = HomeBanner::all();
        return view('backend.banner.index')->withBanner($banner);
    }

    public function add()
    {
        return view('backend.banner.add');
    }
    public function store(request $request)
    {
        
        return redirect('backend.banner');
    }

    public function destroy($id)
    {
        HomeBanner::find($id)->delete();
        return redirect('backend.banner');
    }
}
