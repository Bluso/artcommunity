<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\ContactData;
use Illuminate\Http\Request;

class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactData::find(1);
        return view('backend.contact.index')->withContact($contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = ContactData::find(1);
        if(empty($contact)){
            $contact = new ContactData;
        }
        $contact->name_th = $request->name_th;
        $contact->name_en = $request->name_en;
        $contact->address = $request->address;
        $contact->telephone = $request->telephone;
        $contact->fax = $request->fax;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $contact->save();
    

        return redirect('backend/contact');
    }

    public function changFormatTelFax($n)
    {
        $n = preg_replace('/^0|\s+/', '', $n);
        $n = '+66'.$n;

        return $n;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function show(ContactData $contactData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactData $contactData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactData $contactData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactData $contactData)
    {
        //
    }
}
