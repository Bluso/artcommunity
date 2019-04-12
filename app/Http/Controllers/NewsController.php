<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;
use App\NewsActivitys;
use App\CategoriesNewsActivitys;
use App\Logo;

class NewsController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','3');
        $cateactivity = CategoriesNewsActivitys::latest()->get();
        $activity = NewsActivitys::latest()->get();
        $logo = Logo::first();
        return view('news.index')->withBanner($banner)->withNews($activity)->withCate($cateactivity)->withLogo($logo);
    }

    public function detail($id)
    {
        $news = NewsActivitys::where('id',$id)->get();
        $activities = NewsActivitys::latest()->take(3)->where('type','2')->get();
        return view('news_detail.index')->withActivities($activities)->withNews($news);
    }
}
