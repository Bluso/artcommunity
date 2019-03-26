<?php

namespace App\Http\Controllers\Backend;

use App\CategoriesKnowledge;
use App\KnowledgeResearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CateKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge = CategoriesKnowledge::all();
        return view('backend.knowledge_category.index')->withKnowledge($knowledge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.knowledge_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new CategoriesKnowledge;
        $cate->title = $request->title;
        $cate->description = $request->description;
        $cate->keywords = $request->keywords;
        if($request->hasfile('thumb')) 
        { 
            $file = $request->file('thumb');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/cate_knowledge',$file, $filename);
            $cate->thumb = $filename;
        }
        $cate->save();
        return redirect('backend/knowledge/cate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriesKnowledge  $CategoriesKnowledge
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriesKnowledge $CategoriesKnowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriesKnowledge  $CategoriesKnowledge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesKnowledge::find($id);
        return view('backend.knowledge_category.edit')->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriesKnowledge  $CategoriesKnowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'thumb' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_know_cate = CategoriesKnowledge::find($id);
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension_thumb = $file_thumb->getClientOriginalExtension();
            $filename_thumb =time().'.'.$extension_thumb;
            Storage::disk('public')->putFileAs('images/cate_knowledge',$file_thumb, $filename_thumb);
            $tbl_know_cate->thumb = $filename_thumb;
        }
        $tbl_know_cate->title = $request->title;
        $tbl_know_cate->description = $request->description;
        $tbl_know_cate->keywords = $request->keywords;
        $tbl_know_cate->save();
        return redirect('backend/knowledge/cate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriesKnowledge  $CategoriesKnowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesKnowledge::find($id)->delete();
        KnowledgeResearch::where('cate_id', $id)->delete();
        return redirect('backend/knowledge/cate');
    }
}
