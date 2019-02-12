<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

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

    public function edit($id)
    {
        $banner = HomeBanner::find($id);
        return view('backend.banner.edit')->withBanner($banner);
    }

    public function storeedit(request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_banner = HomeBanner::find($request->id);

        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/banner',$file, $filename);
            $tbl_banner->image = $filename;
        }
        
        $tbl_banner->title = $request->title;
        $tbl_banner->url = $request->url;
        $tbl_banner->keywords = $request->keywords;
        $tbl_banner->seo = $request->title.','.$request->keywords;
        $tbl_banner->save();
        return redirect('backend/banner');
    }

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
        $tbl_banner->image = $filename;
        $tbl_banner->title = $request->title;
        $tbl_banner->url = $request->url;
        $tbl_banner->keywords = $request->keywords;
        $tbl_banner->seo = $request->title.','.$request->keywords;
        $tbl_banner->save();
        return redirect('backend/banner');
    }

    public function destroy($id)
    {
        HomeBanner::find($id)->delete();
        return redirect('backend/banner');
    }
}
