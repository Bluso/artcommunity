<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AboutMember;
use App\AboutHistory;

class AboutController extends Controller
{
    public function index()
    {
        $member = AboutMember::all();
        $history = AboutHistory::find(1);
        return view('about.index')->withMember($member)->withHistory($history);
    }
}
