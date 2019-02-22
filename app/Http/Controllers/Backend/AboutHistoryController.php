<?php

namespace App\Http\Controllers\Backend;

use App\AboutHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutHistoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $history = AboutHistory::first();
        return view('backend.about_history.index')->withHistory($history);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'detail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_about = AboutHistory::find($id);
        if($request->hasfile('image')) 
        { 
            $file_thumb = $request->file('image');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/about/history',$file_thumb, $filename_thumb);
            $tbl_about->image = $filename_thumb;
        }
        $tbl_about->detail = $request->detail;
        $tbl_about->save();
        return redirect('backend/about/history');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('about/history/detail', $file , $file_name);
        echo url('/storage/about/history/detail/'.$file_name);
    }
}
