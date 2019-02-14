<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\KnowledgeResearch;
use App\NewsActivitys;

class HomeController extends Controller
{
    public function index()
    {
        $knowledge = KnowledgeResearch::latest()->limit(4)->get();
        $news = NewsActivitys::latest()->get();
        return view('home.index')
        ->withKnowledge($knowledge)
        ->withNews($news);
    }
}
