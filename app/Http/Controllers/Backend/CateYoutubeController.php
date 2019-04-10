<?php

namespace App\Http\Controllers\Backend;

use App\CategoriesYoutube;
use App\Youtube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CateYoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge = CategoriesYoutube::all();
        return view('backend.youtube_category.index')->withYoutube($knowledge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.youtube_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new CategoriesYoutube;
        $cate->title = $request->title;
        $cate->description = $request->description;
        $cate->keywords = $request->keywords;
        $cate->save();
        return redirect('backend/youtube/cate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriesYoutube  $CategoriesYoutube
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriesYoutube $CategoriesYoutube)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriesYoutube  $CategoriesYoutube
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesYoutube::find($id);
        return view('backend.youtube_category.edit')->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriesYoutube  $CategoriesYoutube
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $tbl_know_cate = CategoriesYoutube::find($id);
      
        $tbl_know_cate->title = $request->title;
        $tbl_know_cate->description = $request->description;
        $tbl_know_cate->keywords = $request->keywords;
        $tbl_know_cate->save();
        return redirect('backend/youtube/cate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriesYoutube  $CategoriesYoutube
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesYoutube::find($id)->delete();
        Youtube::where('cate_id', $id)->delete();
        return redirect('backend/youtube/cate');
    }
}
