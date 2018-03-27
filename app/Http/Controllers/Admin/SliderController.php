<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ImageHelper;
use App\Slider;
use Barryvdh\Debugbar\Facade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    private $sliderFolder = 'slider';

    public function index() {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    public function store(Request $request) {
        if (!$request->has('file'))
            return response()->json(null);

        $file = $request->file('file');

        $relativePath = ImageHelper::storeImageToStorage($file, $this->sliderFolder);

        if (empty($relativePath))
            response()->json(false);

        $success = Slider::createFrom($relativePath);

        return response()->json($success);
    }

    public function destroy(Request $request) {
        $ids = $request->get('slider-id');

        if (empty($ids))
            return back();


        $deleted = ImageHelper::deleteSlidersFromStorage($ids);

        if (!$deleted)
            return back()->with('errors', ["Hãy thử lại sau"]);

        Slider::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }
}
