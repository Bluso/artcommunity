<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\KnowledgeResearch;
use App\NewsActivitys;
use App\Home;
use App\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $knowledge = KnowledgeResearch::latest()->limit(4)->get();
        $news = NewsActivitys::latest()->take(4)->get();
        $home = Home::all();
        $banner = Banner::all()->where('page_id','1');
        return view('home.index')
        ->withKnowledge($knowledge)
        ->withNews($news)
        ->withHome($home)
        ->withBanner($banner);
    }
}
