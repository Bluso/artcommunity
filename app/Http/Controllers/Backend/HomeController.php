<?php

namespace App\Http\Controllers\Backend;

use App\Home;
use App\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Home::all();
        $logo = Logo::all()->first();
        return view('backend.home.index')->withHome($home)->withLogo($logo);
    }

    public function edit($id)
    {
        $home = Home::find($id);
        return view('backend.home.edit')->withHome($home);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'thumb' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_home = Home::find($id);

        if($request->hasfile('thumb'))
        {
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/home/thumb',$file_thumb, $filename_thumb);
            $tbl_home->thumb = $filename_thumb;
        }
        $tbl_home->title = $request->title;
        $tbl_home->url = $request->url;
        $tbl_home->description = $request->description;
        $tbl_home->keywords = $request->keyword;
        $tbl_home->save();
        return redirect('backend/home');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_th' => 'required|max:255',
            'title_en' => 'required|max:255',
            'image_title' => 'image|mimes:jpeg,png,jpg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logo = Logo::find(1);
        if (empty($logo)) {
            $logo = new Logo;
        }
        $logo->title_th = $request->title_th;
        $logo->title_en = $request->title_en;
        if($request->hasfile('logo'))
        {
            $file_logo = $request->file('logo');
            $extension = $file_logo->getClientOriginalExtension();
            $filename_logo = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/home/logo',$file_logo, $filename_logo);
            $logo->logo = $filename_logo;
        }
        if($request->hasfile('image_title'))
        {
            $file_image_title = $request->file('image_title');
            $extension = $file_image_title->getClientOriginalExtension();
            $filename_image_title = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/home/image_title',$file_image_title, $filename_image_title);
            $logo->img_title_th = $filename_image_title;
        }
        $logo->save();
        return redirect('backend/home');
    }
}
