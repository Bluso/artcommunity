<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;
use App\KnowledgeResearch;
use App\Youtube;
use App\CategoriesYoutube;
use App\Logo;

class KnowledgeController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','5');
        $knowledge = KnowledgeResearch::latest()->get();
        $youtube = Youtube::all();
        $cateyoutube = CategoriesYoutube::all();
        $logo = Logo::first();
        return view('knowledge.index')->withBanner($banner)->withKnowledge($knowledge)->withYoutube($youtube)->withCateyoutube($cateyoutube)->withLogo($logo);
    }
}
