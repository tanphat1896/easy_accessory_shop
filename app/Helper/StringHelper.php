<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 3/24/18
 * Time: 3:00 PM
 */

namespace App\Helper;


use App\LoaiSanPham;

class StringHelper {
    const IMG_DIR = 'assets/images';

    public static function toSlug($str) {
        $str = trim(mb_strtolower($str));

        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return $str;
    }

    public static function buildImageRelativePath($folder, $filename) {
        $relativePath = self::IMG_DIR .
            DIRECTORY_SEPARATOR . $folder;

        if (!file_exists($relativePath))
            mkdir($relativePath, 0777, true);

        $relativePath .= DIRECTORY_SEPARATOR . $filename;

        return $relativePath;
    }

    public static function absolutePath($relative) {
        return public_path($relative);
    }

    public static function buildImageRelativePathFromProductType($productId) {
        $name = LoaiSanPham::findOrFail($productId)->getName();

        $name = str_replace(' ', "_", $name);

        $pathFromImageDir = "uploaded/products" . DIRECTORY_SEPARATOR . strtolower($name);

        $fullPath = self::IMG_DIR . DIRECTORY_SEPARATOR .
            "uploaded/products" . DIRECTORY_SEPARATOR . strtolower($name);

        if (!file_exists($fullPath))
            mkdir($fullPath, 0777, true);

        return $pathFromImageDir;
    }

    public static function getNumberFromCurrency($currencyString) {
        return preg_replace('/[.,\sđA-Za-z]/im', '', $currencyString);
    }
}