<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 3/24/18
 * Time: 3:00 PM
 */

namespace App\Helper;


use App\HinhAnh;
use App\Slider;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper {

    public static function storeImageToStorage(UploadedFile $file, $folder) {
        $filename = time() . random_int(1, 100) . "." . strtolower($file->getClientOriginalExtension());

        $relativePath = StringHelper::buildImageRelativePath($folder, $filename);

        $image = Image::make($file);

        $image->save($relativePath);

        return $relativePath;
    }

    public static function deleteSlidersFromStorage($sliderIds) {
        $sliders = Slider::select('hinh_anh')->whereIn('id', $sliderIds)->get();

        $realPaths = $sliders->filter(function($slider) {
            return file_exists($slider->hinh_anh);
        })->map(function($slider) { return $slider->hinh_anh; });

        return Storage::delete($realPaths->toArray());
    }

    public static function deleteAnhChiTietFromStorage($ids) {
        $hinhAnhs = HinhAnh::select('lien_ket')->whereIn('id', $ids)->get();

//      dùng cách này vì giải quyết lỗi không dùng được Storage trên hosting
        $deleted = $hinhAnhs->filter(function($hinhAnh) {
            return file_exists($hinhAnh->lien_ket);
        })->map(function($hinhAnh) {
            return unlink($hinhAnh->lien_ket);
        });

        return count(array_unique($deleted->toArray())) < 2;
    }

    public static function deleteImageFromStorage($relativePath) {
        if (file_exists($relativePath))
            unlink($relativePath);

        return true;
    }
}