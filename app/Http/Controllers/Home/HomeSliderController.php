<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function homeSlider(){
        $homeSlider = HomeSlider::find(1);
        return view('Backend.admin.home.home_slider',compact('homeSlider'));
    }
}
