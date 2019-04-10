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
        $youtube = Youtube::find($id);
        return view('backend.youtube.edit')->withYoutube($youtube)->withCategory($cate);
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
            'title' => 'required|max:255'
        ]);
        $youtube = Youtube::find($id);

        $youtube->cate_id = $request->cate_id;
        $youtube->title = $request->title;
        $youtube->youtube = $request->urlstrim;
        $youtube->keywords = $request->keywords;
        $youtube->seo = $request->keywords.','.$request->title.','.$request->youtube;
        $youtube->save();

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
