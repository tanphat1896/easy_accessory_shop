<?php

namespace App\Http\Controllers\Frontend;

use App\SanPham;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $ssds = SanPham::whereLoaiSanPhamId(1)->limit(6)->get();

        $sliders = Slider::all();

        return view('index', compact('ssds', 'sliders'));
    }
}
