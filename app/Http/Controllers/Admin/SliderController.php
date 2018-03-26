<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index() {
        $slides = Slider::all();

        return view('admin.slider.index', compact('slides'));
    }

    public function store(Request $request) {
        $file = $request->file('slider');
        $file = Image::make($file)->resize(400, 300);
        $file->save(public_path('assets/') . "hihi.jpg");
        return back();
    }
}
