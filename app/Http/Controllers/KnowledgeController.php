<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;
use App\KnowledgeResearch;
use App\Youtube;

class KnowledgeController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','5');
        $knowledge = KnowledgeResearch::latest()->get();
        $youtube = Youtube::all();
        return view('knowledge.index')->withBanner($banner)->withKnowledge($knowledge)->withYoutube($youtube);
    }
}
