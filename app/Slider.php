<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public static function createFrom($path) {
        $slider = new self;

        $slider->hinh_anh = $path;
        $slider->save();

        return true;
    }
}
