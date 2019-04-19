<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;
use App\ContactData;

class ContactController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','6');
        $contact = ContactData::first();
        return view('contact.index')->withBanner($banner)->withContact($contact);
    }
}
