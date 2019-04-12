<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Banner;
use App\ContactData;
use App\Logo;

class ContactController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->where('page_id','6');
        $contact = ContactData::first();
        $logo = Logo::first();
        return view('contact.index')->withBanner($banner)->withContact($contact)->withLogo($logo);
    }
}
