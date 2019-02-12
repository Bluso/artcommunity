<?php

namespace App\Http\Controllers\Backend;

use App\RelatedLaw;
use App\CategoriesRelatedLaw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws = RelatedLaw::all();
        return view('backend.laws.index')->withLaws($laws);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoriesRelatedLaw::all();
        return view('backend.laws.add')->withCategory($cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laws = new RelatedLaw;
        $laws->law_cate_id = $request->law_cate_id;
        $laws->title = $request->title;
        $laws->description = $request->description;
        $laws->keywords = $request->keywords;
        $laws->detail = $request->detail;
        $laws->seo = $request->keywords.','.$request->title.','.$request->description; 
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension = $file_thumb->getClientOriginalExtension();
            $filename_thumb = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/laws/thumb',$file_thumb, $filename_thumb);
            $laws->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/laws',$file, $filename);
            $laws->image = $filename;
        }
        $laws->save();
        return redirect('backend/laws');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelatedLaw  $RelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function show(RelatedLaw $RelatedLaw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelatedLaw  $RelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laws = RelatedLaw::find($id);
        $cate = CategoriesRelatedLaw::all();
        return view('backend.laws.edit')->withLaws($laws)->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RelatedLaw  $RelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_laws = RelatedLaw::find($id);
        
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/laws/thumb',$file_thumb, $filename_thumb);
            $tbl_laws->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/laws',$file, $filename);
            $tbl_laws->image = $filename;
        }
        
        $tbl_laws->title = $request->title;
        $tbl_laws->description = $request->description;
        $tbl_laws->law_cate_id = $request->law_cate_id;
        $tbl_laws->keywords = $request->keywords;
        $tbl_laws->detail = $request->detail;
        $tbl_laws->seo = $request->keywords.','.$request->title.','.$request->description; 
        $tbl_laws->save();
        return redirect('backend/laws');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelatedLaw  $RelatedLaw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelatedLaw::find($id)->delete();
        return redirect('backend/laws');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('laws/detail', $file , $file_name);
        echo url('/storage/laws/detail/'.$file_name);
    }
}
