<?php

namespace App\Http\Controllers\Backend;

use App\CategoriesNewsActivitys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class CateNewsActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = CategoriesNewsActivitys::all();
        return view('backend.new_category.index')->withNews($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.new_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new CategoriesNewsActivitys;
        $cate->title = $request->title;
        $cate->description = $request->description;
        $cate->keywords = $request->keywords;
        $cate->detail = $request->detail;
        if($request->hasfile('thumb')) 
        { 
            $file = $request->file('thumb');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/cate_news',$file, $filename);
            $cate->thumb = $filename;
        }
        $cate->save();
        return redirect('backend/news/cate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriesNewsActivitys $categoriesNewsActivitys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesNewsActivitys::find($id);
        return view('backend.new_category.edit')->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_news_cate = CategoriesNewsActivitys::find($id);
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/cate_news',$file_thumb, $filename_thumb);
            $tbl_news_cate->thumb = $filename_thumb;
        }
        $tbl_news_cate->title = $request->title;
        $tbl_news_cate->description = $request->description;
        $tbl_news_cate->keywords = $request->keywords;
        $tbl_news_cate->detail = $request->detail;
        $tbl_news_cate->save();
        return redirect('backend/news/cate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesNewsActivitys::find($id)->delete();
        return redirect('backend/news/cate');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('category/news/detail', $file , $file_name);
        echo url('/storage/category/news/detail/'.$file_name);
    }
}
