<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\KnowledgeResearch;
use App\NewsActivitys;
use App\Home;
use App\Banner;
use App\Logo;

class HomeController extends Controller
{
    public function index()
    {
        $knowledge = KnowledgeResearch::latest()->limit(4)->get();
        //Query Activity
        $news = NewsActivitys::latest()->take(4)->where('type','2')->get();
        $home = Home::all();
        $banner = Banner::all()->where('page_id','1');
        $logo = Logo::first();
        return view('home.index')
        ->withKnowledge($knowledge)
        ->withNews($news)
        ->withHome($home)
        ->withBanner($banner)
        ->withLogo($logo);
    }
}
