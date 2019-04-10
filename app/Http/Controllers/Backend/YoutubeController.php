<?php

namespace App\Http\Controllers\Backend;

use App\Youtube;
use App\CategoriesYoutube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge = Youtube::all();
        return view('backend.youtube.index')->withYoutube($knowledge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoriesYoutube::all();
        return view('backend.youtube.add')->withCategory($cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $knowledge = new Youtube;
        $knowledge->cate_id = $request->cate_id;
        $knowledge->title = $request->title;
        $knowledge->youtube = $request->urlstrim;
        $knowledge->keywords = $request->keywords;
        $knowledge->seo = $request->keywords.','.$request->title.','.$request->url;
        $knowledge->save();
        return redirect('backend/youtube');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Youtube  $Youtube
     * @return \Illuminate\Http\Response
     */
    public function show(Youtube $Youtube)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Youtube  $Youtube
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesYoutube::all();
        $knowledge = Youtube::find($id);
        return view('backend.youtube.edit')->withYoutube($knowledge)->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Youtube  $Youtube
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_knowledge = Youtube::find($id);
        
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/knowledge/thumb',$file_thumb, $filename_thumb);
            $tbl_knowledge->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/knowledge',$file, $filename);
            $tbl_knowledge->image = $filename;
        }
        if($request->hasfile('file')) 
        { 
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/knowledge/pdf',$file, $filename);
            $tbl_knowledge->file = $filename;
        }
        
        $tbl_knowledge->cate_id = $request->cate_id;
        $tbl_knowledge->title = $request->title;
        $tbl_knowledge->description = $request->description;
        $tbl_knowledge->keywords = $request->keywords;
        $tbl_knowledge->detail = $request->detail;
        $tbl_knowledge->seo = $request->keywords.','.$request->title.','.$request->description; 
        $tbl_knowledge->save();
        return redirect('backend/youtube');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Youtube  $Youtube
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Youtube::find($id)->delete();
        return redirect('backend/youtube');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('knowledge/detail', $file , $file_name);
        echo url('/storage/knowledge/detail/'.$file_name);
    }
}
