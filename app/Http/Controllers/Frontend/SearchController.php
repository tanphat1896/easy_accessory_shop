<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\SearchProduct;
use App\Helper\StringHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    use SearchProduct;
    public function search($keyword = '') {
        $keyword = trim($keyword);
        if (empty($keyword))
            return response()->json(false);

        $keyword = preg_replace('/\s/', '%', $keyword);

        $limitResult = 5;

        $products = $this->searchByName($keyword, $limitResult);

        return response()->json(compact('products'));
    }
}
