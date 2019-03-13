<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;

class NewsController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','3');
        return view('news.index')->withBanner($banner);
    }
}
