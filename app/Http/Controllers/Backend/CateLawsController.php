<?php

namespace App\Http\Controllers\Backend;

use App\RelatedLaw;
use App\CategoriesRelatedLaw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Carbon\Carbon;

class CateLawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws = CategoriesRelatedLaw::all();
        return view('backend.laws_category.index')->withLaws($laws);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.laws_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new CategoriesRelatedLaw;
        $cate->title = $request->title;
        $cate->description = $request->description;
        $cate->keywords = $request->keywords;
        $cate->detail = $request->detail;
        if($request->hasfile('thumb')) 
        { 
            $file = $request->file('thumb');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/cate_laws',$file, $filename);
            $cate->thumb = $filename;
        }
        $cate->save();
        return redirect('backend/laws/cate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriesRelatedLaw  $CategoriesRelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriesRelatedLaw $CategoriesRelatedLaw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriesRelatedLaw  $CategoriesRelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesRelatedLaw::find($id);
        return view('backend.laws_category.edit')->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriesRelatedLaw  $CategoriesRelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_laws_cate = CategoriesRelatedLaw::find($id);
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/cate_laws',$file_thumb, $filename_thumb);
            $tbl_laws_cate->thumb = $filename_thumb;
        }
        $tbl_laws_cate->title = $request->title;
        $tbl_laws_cate->description = $request->description;
        $tbl_laws_cate->keywords = $request->keywords;
        $tbl_laws_cate->detail = $request->detail;
        $tbl_laws_cate->save();
        return redirect('backend/laws/cate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriesRelatedLaw  $CategoriesRelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesRelatedLaw::find($id)->delete();
        RelatedLaw::where('law_cate_id',$id)->delete();
        return redirect('backend/laws/cate');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('category/laws/detail', $file , $file_name);
        echo url('/storage/category/laws/detail/'.$file_name);
    }
}
