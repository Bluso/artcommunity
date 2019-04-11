<?php

namespace App\Http\Controllers\Backend;

use App\NewsActivitys;
use App\CategoriesNewsActivitys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsActivitys::all();
        return view('backend.news.index')->withNews($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoriesNewsActivitys::all();
        return view('backend.news.add')->withCategory($cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new NewsActivitys;
        $news->cate_id = $request->cate_id;
        $news->type = $request->type;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->keywords = $request->keywords;
        $news->detail = $request->detail;
        $news->seo = $request->title.','.$request->keywords.','.$request->description;
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension = $file_thumb->getClientOriginalExtension();
            $filename_thumb = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/news/thumb',$file_thumb, $filename_thumb);
            $news->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/news',$file, $filename);
            $news->image = $filename;
        }
        $news->save();
        return redirect('backend/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function show(NewsActivitys $newsActivitys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsActivitys::find($id);
        $cate = CategoriesNewsActivitys::all();
        return view('backend.news.edit')->withNews($news)->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_news = NewsActivitys::find($id);
        
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/news/thumb',$file_thumb, $filename_thumb);
            $tbl_news->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/news',$file, $filename);
            $tbl_news->image = $filename;
        }
        if($request->hasfile('file')) 
        { 
            $file_attach = $request->file('file');
            $extension_attach = $file_attach->getClientOriginalExtension();
            $filename_attach =time().'.'.$extension_attach;
            Storage::disk('public')->putFileAs('files/news',$file_attach, $filename_attach);
            $tbl_news->file = $filename_attach;
        }
        $tbl_news->type = $request->type;
        $tbl_news->title = $request->title;
        $tbl_news->description = $request->description;
        if ($tbl_news->type == 1) {
            $tbl_news->cate_id = null;
        } else {
            $tbl_news->cate_id = $request->cate_id;
        }
        $tbl_news->keywords = $request->keywords;
        $tbl_news->detail = $request->detail;
        $tbl_news->seo = $request->title.','.$request->keywords.','.$request->description;
        $tbl_news->save();

        return redirect('backend/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewsActivitys::find($id)->delete();
        return redirect('backend/news');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('news/detail', $file , $file_name);
        echo url('/storage/news/detail/'.$file_name);
    }

    public function delete_file(Request $request)
    {
        $news = NewsActivitys::find($request->input('id'));
        $news->file = null;
        $news->save();
        return $news;
    }
}
