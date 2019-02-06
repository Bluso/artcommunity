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
    public function edit(CategoriesNewsActivitys $categoriesNewsActivitys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriesNewsActivitys $categoriesNewsActivitys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriesNewsActivitys  $categoriesNewsActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriesNewsActivitys $categoriesNewsActivitys)
    {
        //
    }
}
