<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class BannerController extends Controller
{
   
    public function index()
    {
        $banner = Banner::all();
        return view('backend.banner.index')->withBanner($banner);
    }

    public function add()
    {
        $page_list = config('page.page_list');
        return view('backend.banner.add')->withPagelist($page_list);
    }

    public function edit($id)
    {
        $page_list = config('page.page_list');
        $banner = Banner::find($id);
        return view('backend.banner.edit')->withBanner($banner)->withPagelist($page_list);
    }

    public function storeedit(request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_banner = Banner::find($request->id);

        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/banner',$file, $filename);
            $tbl_banner->image = $filename;
        }
        if($request->hasfile('image_mobile')) 
        { 
            $file_m = $request->file('image_mobile');
            $extension_m = $file_m->getClientOriginalExtension();
            $filename_mobile =time().'_m.'.$extension_m;
            Storage::disk('public')->putFileAs('images/banner',$file_m, $filename_mobile);
            $tbl_banner->image_mobile = $filename_mobile;
        }
        $tbl_banner->page_id = $request->page;
        $tbl_banner->title = $request->title;
        $tbl_banner->description = $request->description;
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
        if($request->hasfile('image_mobile')) 
        { 
            $file_m = $request->file('image_mobile');
            $extension_m = $file_m->getClientOriginalExtension();
            $filename_mobile =time().'_m.'.$extension_m;
            Storage::disk('public')->putFileAs('images/banner/',$file_m,$filename_mobile);
        }
        $tbl_banner = new Banner;
        $tbl_banner->page_id = $request->page;
        $tbl_banner->image = $filename;
        $tbl_banner->image_mobile = $filename_mobile;
        $tbl_banner->title = $request->title;
        $tbl_banner->description = $request->description;
        $tbl_banner->url = $request->url;
        $tbl_banner->keywords = $request->keywords;
        $tbl_banner->seo = $request->title.','.$request->keywords;
        $tbl_banner->save();
        return redirect('backend/banner');
    }

    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect('backend/banner');
    }
}
