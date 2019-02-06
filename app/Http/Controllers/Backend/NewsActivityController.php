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
        dd($request->all());
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
    public function edit(NewsActivitys $newsActivitys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsActivitys $newsActivitys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsActivitys  $newsActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsActivitys $newsActivitys)
    {
        //
    }
}
