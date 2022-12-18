<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $aboutPage = About::find(1);
        return view('Backend.admin.about.about',compact('aboutPage'));
    }
}
