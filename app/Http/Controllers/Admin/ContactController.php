<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function getContact()
    {
        $contact = DB::table('vnecontact')
            ->select()
            ->get();
        //dd($contact);
        return view('admin.contact.index', compact('contact'));
    }
}
