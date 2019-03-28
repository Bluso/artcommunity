<?php

namespace App\Http\Controllers\Backend;

use App\KnowledgeResearch;
use App\CategoriesKnowledge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge = KnowledgeResearch::all();
        return view('backend.knowledge.index')->withKnowledge($knowledge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = CategoriesKnowledge::all();
        return view('backend.knowledge.add')->withCategory($cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $knowledge = new KnowledgeResearch;
        $knowledge->cate_id = $request->cate_id;
        $knowledge->title = $request->title;
        $knowledge->description = $request->description;
        $knowledge->keywords = $request->keywords;
        $knowledge->detail = $request->detail;
        $knowledge->seo = $request->keywords.','.$request->title.','.$request->description; 
        if($request->hasfile('thumb')) 
        { 
            $file_thumb = $request->file('thumb');
            $extension = $file_thumb->getClientOriginalExtension();
            $filename_thumb = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/knowledge/thumb',$file_thumb, $filename_thumb);
            $knowledge->thumb = $filename_thumb;
        }
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/knowledge',$file, $filename);
            $knowledge->image = $filename;
        }
        if($request->hasfile('file')) 
        { 
            $file_pdf = $request->file('file');
            $extension = $file_pdf->getClientOriginalExtension();
            $filename_pdf = time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/knowledge/pdf',$file_pdf, $filename_pdf);
            $knowledge->file = $filename_pdf;
        }
        $knowledge->save();
        return redirect('backend/knowledge');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KnowledgeResearch  $knowledgeResearch
     * @return \Illuminate\Http\Response
     */
    public function show(KnowledgeResearch $knowledgeResearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KnowledgeResearch  $knowledgeResearch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = CategoriesKnowledge::all();
        $knowledge = KnowledgeResearch::find($id);
        return view('backend.knowledge.edit')->withKnowledge($knowledge)->withCategory($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KnowledgeResearch  $knowledgeResearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_knowledge = KnowledgeResearch::find($id);
        
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
        return redirect('backend/knowledge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KnowledgeResearch  $knowledgeResearch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KnowledgeResearch::find($id)->delete();
        return redirect('backend/knowledge');
    }

    public function upload_image(Request $request)
    {
        $file = $request->file('file');
        $file_name   = time() . '-' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs('knowledge/detail', $file , $file_name);
        echo url('/storage/knowledge/detail/'.$file_name);
    }
}
