<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AboutMember;

class AboutController extends Controller
{
    public function index()
    {
        $member = AboutMember::all();
        return view('about.index')->withMember($member);
    }
}
