<?php

namespace App\Http\Controllers;

use App\Acme\Behavior\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    use Filter;
    public function filter(Request $request) {
        $builder = DB::table('san_phams')
            ->where('loai_san_pham_id', 1)
            ->join('gia_san_phams', "san_phams.id", '=', 'gia_san_phams.san_pham_id')
            ->where('gia_san_phams.active', 1);
        $this->bindFilterToBuilder($builder, $request->all());
        dd($this->translatedFilters);
    }
}
