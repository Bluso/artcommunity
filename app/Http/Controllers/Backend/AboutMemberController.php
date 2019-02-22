<?php

namespace App\Http\Controllers\Backend;

use App\AboutMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class AboutMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_member = AboutMember::all();
        return view('backend.about_member.index')->withMember($about_member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about_member.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $about_member = new AboutMember;
        $about_member->name = $request->name;
        $about_member->position = $request->position;
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/about/member',$file, $filename);
            $about_member->image = $filename;
        }
        $about_member->save();
        return redirect('backend/about/member');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutMember  $AboutMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_member = AboutMember::find($id);
        return view('backend.about_member.edit')->withMember($about_member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutMember  $AboutMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tbl_about_member = AboutMember::find($id);
        
        if($request->hasfile('image')) 
        { 
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->putFileAs('images/about/member',$file, $filename);
            $tbl_about_member->image = $filename;
        }
       
        $tbl_about_member->name = $request->name;
        $tbl_about_member->position = $request->position;
        $tbl_about_member->save();
        return redirect('backend/about/member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutMember  $AboutMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutMember::find($id)->delete();
        return redirect('backend/about/member');
    }

}
