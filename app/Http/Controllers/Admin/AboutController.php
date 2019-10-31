<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    //
    public function getAbout()
    {
        $about = DB::table('aboutus')
            ->select()
            ->first();
        //dd($about);
        return view('admin.about.index', compact('about'));
    }
}
