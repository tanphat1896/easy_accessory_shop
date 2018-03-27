<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 3/24/18
 * Time: 3:00 PM
 */

namespace App\Helper;


use App\Slider;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper {

    public static function storeImageToStorage(UploadedFile $file, $folder) {
        $filename = time() . random_int(1, 100) . "." . strtolower($file->getClientOriginalExtension());

        $relativePath = StringHelper::buildImageRelativePath($folder, $filename);

        $image = Image::make($file);

        $image->save(StringHelper::absolutePath($relativePath));

        return $relativePath;
    }

    public static function deleteSlidersFromStorage($sliderIds) {
        $sliders = Slider::select('hinh_anh')->whereIn('id', $sliderIds)->get();

        $paths = $sliders->map(function($slider) {
             return ($slider->hinh_anh);
        });

        return Storage::delete($paths->toArray());
    }
}