<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBanner;
use Illuminate\Support\Facades\Storage;

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

    {
        
        return redirect('backend.banner');

    public function store(request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/banner/',$file,$filename);
        }
        $tbl_banner = new HomeBanner;
        $tbl_banner->images = $filename;
        $tbl_banner->title = $request->title;
        $tbl_banner->keywords = $request->keywords;
        $tbl_banner->save();
        return redirect('backend/banner');
    }

    public function destroy($id)
    {
        HomeBanner::find($id)->delete();
        return redirect('backend.banner');
    }
}
