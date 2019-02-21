<?php

namespace App\Http\Controllers\Backend;

use App\Home;
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
        return view('backend.home.index')->withHome($home);
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
        $tbl_home->description = $request->description;
        $tbl_home->keywords = $request->keywords;
        $tbl_home->save();
        return redirect('backend/home');
    }
}
